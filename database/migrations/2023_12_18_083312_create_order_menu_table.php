<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMenuTable extends Migration
{
    public function up()
    {
        Schema::create('order_menus', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->char('menu_id', 6);
            $table->integer('quantity');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_menu', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['order_id']);
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('order_menu');
    }
}
