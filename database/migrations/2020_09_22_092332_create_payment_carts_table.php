<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_carts', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('fullname');
            $table->text('address');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->bigInteger('phone');
            $table->integer('status_order')->default(0);
            $table->text('description');
            $table->integer('payment');
            $table->string('order_place');
            $table->string('order_way');
            $table->string('bank_code');
            $table->text('product_name');
            $table->text('product_price');
            $table->text('product_count');
            $table->text('product_discount');
            $table->text('product_finalPrice');
            $table->integer('tax');
            $table->integer('service_charge');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_carts');
    }
}
