<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->nullable();
            $table->enum('price',['none','price-add','price-deduct','price'])->default('none');
            $table->enum('cost',['none','cost'])->default('none');
            $table->enum('image',['none','image'])->default('none');
            $table->enum('status',['inactive','active'])->default('inactive');
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
        Schema::dropIfExists('product_specs');
    }
}
