<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // 1. Nama item (varchar)
            $table->text('description'); // 2. Deskripsi (text)
            $table->text('picture'); // 3. Gambar (text, untuk menyimpan URL atau path file)
            $table->boolean('type')->default('0'); // 4. Tipe (boolean), dengan nilai default 'false'
            $table->unsignedInteger('price'); // 5. Harga (integer tanpa tanda, cocok untuk Rupiah)
            $table->timestamps(); // Kolom standar: created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
