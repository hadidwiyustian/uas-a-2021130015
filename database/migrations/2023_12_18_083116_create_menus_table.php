<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->string('nama');
            $table->boolean('rekomendasi');
            $table->double('harga', 10, 2);
            $table->string('kategori');
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
