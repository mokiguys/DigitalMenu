<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('fa')->nullable()->collation = 'utf8_general_ci';
            $table->string('en')->nullable()->collation = 'utf8_general_ci';
            $table->string('tr')->nullable()->collation = 'utf8_general_ci';
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->integer('currency');
            $table->integer('discount')->default(0);
            $table->integer('exist')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_food');
            $table->text('description_fa')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_en')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_tr')->nullable()->collation = 'utf8_general_ci';
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
        Schema::dropIfExists('menus');
    }
}
