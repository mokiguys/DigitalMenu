<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('creatorType')->default('user');
            $table->integer('confirmAdmin')->default(0);
            $table->integer('freePlan')->default(0);
            $table->integer('plan')->default(1);
            $table->string('started_at');
            $table->integer('expire_day');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('fa')->nullable()->collation = 'utf8_general_ci';
            $table->string('en')->nullable()->collation = 'utf8_general_ci';
            $table->string('tr')->nullable()->collation = 'utf8_general_ci';
            $table->string('email');
            $table->integer('confirmEmail')->default(0);
            $table->string('subtitle_fa')->nullable()->collation = 'utf8_general_ci';
            $table->string('subtitle_en')->nullable()->collation = 'utf8_general_ci';
            $table->string('subtitle_tr')->nullable()->collation = 'utf8_general_ci';
            $table->integer('AddressShop')->default(1);
            $table->string('location')->nullable();
            $table->string('address_fa')->nullable()->collation = 'utf8_general_ci';
            $table->string('address_en')->nullable()->collation = 'utf8_general_ci';
            $table->string('address_tr')->nullable()->collation = 'utf8_general_ci';
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_stores');
            $table->text('description_fa')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_en')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_tr')->nullable()->collation = 'utf8_general_ci';
            $table->string('logo')->nullable();
            $table->string('main_image')->nullable();
            $table->string('video_link')->nullable();
            $table->string('tell')->nullable();
            $table->string('fax')->nullable();
            $table->string('phone')->nullable();
            $table->string('WhatsApp')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('telegram')->nullable();
            $table->string('youtube')->nullable();
            $table->text('external_link')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
