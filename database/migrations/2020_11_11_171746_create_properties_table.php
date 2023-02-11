<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('fa')->nullable()->collation = 'utf8_general_ci';
            $table->string('en')->nullable()->collation = 'utf8_general_ci';
            $table->string('tr')->nullable()->collation = 'utf8_general_ci';
            $table->string('ar')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_fa')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_en')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_tr')->nullable()->collation = 'utf8_general_ci';
            $table->text('description_ar')->nullable()->collation = 'utf8_general_ci';
            $table->string('image')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('properties');
    }
}
