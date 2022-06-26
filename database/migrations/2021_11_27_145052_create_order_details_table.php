<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('orderID');
            $table->foreign('orderID')->references('id')->on('orders') ->onDelete('cascade');
            $table->unsignedBigInteger('mobileID');
            $table->foreign('mobileID')->references('id')->on('mobiles');
            $table->primary(['orderID', 'mobileID']);
            $table->integer('quantity');
            $table->double('unitPrice');
            $table->double('discount')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
