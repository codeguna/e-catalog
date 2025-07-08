@extends('layouts.dashboard')

@section('title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-list" aria-hidden="true"></i> List Product
                            </span>

                            <div class="float-right">
                                <a href="#" data-toggle="modal" data-target="#createProduct"
                                    class="btn btn-success btn-sm float-right" data-placement="left">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                            @include('product.modal.create')
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Picture</th>
                                        <th>Type</th>
                                        <th>Price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <img class="profile-user-img img-fluid"
                                                    src="/product_pictures/{{ $product->picture }}" style="height: 100px"
                                                    alt="Product picture" loading="lazy">
                                            </td>
                                            <td>
                                                @if ($product->type == 1)
                                                    Satuan
                                                @elseif ($product->type == 2)
                                                    Paket
                                                @elseif ($product->type == 3)
                                                    Sekolah
                                                @endif
                                            </td>
                                            <td>
                                                Rp. {{ number_format($product->price) }}</td>

                                            <td>
                                                <form action="{{ route('backend.products.destroy', $product->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('backend.products.edit', $product->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"
                                                            onclick="return confirm('Delete Product {{ $product->name }}?')"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
