<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $products = Product::all();

        return view('product.index', compact('products'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Product::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        $picture_file   = $request->file('picture');
        $name           = $request->name;
        $description    = $request->description;
        $type           = $request->type;
        $price          = $request->price;

        $name_file = time() . "_" . $picture_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'product_pictures';
        $picture_file->move($tujuan_upload, $name_file);

        $educationalStaffs  = Product::create([
            'name'          => $name,
            'description'   => $description,
            'type'          => $type,
            'price'         => $price,
            'picture'       => $name_file,
            'created_at'    => now()
        ]);

        return redirect()->route('backend.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $validator = Validator::make($request->all(), Product::$rules);
        if ($validator->fails()) {
            // If validation fails, redirect back with error messages
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }

        $name           = $request->name;
        $description    = $request->description;
        $type           = $request->type;
        $price          = $request->price;

        $updateData = [
            'name'          => $name,
            'description'   => $description,
            'type'          => $type,
            'price'         => $price,
        ];

        $picture_file = $request->file('picture');
        if ($picture_file) {
            $name_file = time() . "_" . $picture_file->getClientOriginalName();
            // Directory for uploading the file
            $tujuan_upload = 'product_pictures';
            $picture_file->move($tujuan_upload, $name_file);

            $updateData['id_card'] = $name_file;
        }

        if ($product) {
            $product->update($updateData);

            return redirect()->route('backend.products.index')
                ->with('success', 'Product updated successfully');
        }

        return redirect()->back()->with('error', 'EducationalStaff not found');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product     = Product::select('picture')->where('id', $id)->first();

        $file = public_path('product_picture/' . $product->picture);
        $img = File::delete($file);

        $product = Product::find($id)->delete();
        
        return redirect()->route('backend.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
