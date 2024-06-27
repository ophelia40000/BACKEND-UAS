<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductDetailsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('product_name'); // Nama produk
            $table->integer('product_quantity'); // Jumlah produk
            $table->string('product_size'); // Ukuran produk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('product_name');
            $table->dropColumn('product_quantity');
            $table->dropColumn('product_size');
        });
    }
}