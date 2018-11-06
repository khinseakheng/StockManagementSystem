<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->nullable();
            $table->string('SKU')->nullable();
            $table->string('UPC')->nullable();
            $table->enum('code_symbol',['bar_code','qr_code'])->nullable();
            $table->enum('status',['Inctive','active'])->nullable();
            $table->double('initail_qty_on_hand');
            $table->double('recorder_point')->nullable();
            $table->double('cost');
            $table->enum('taxmethod',['Exclusive','Inclusive']);
            $table->date('as_of_date')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('default_sale_unit_id')->nullable();
            $table->integer('default_purchase_unit_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('tax_group_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->integer('sale_currency_id')->nullable();
            $table->integer('purchase_currency_id')->nullable();
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
        Schema::dropIfExists('product_inventories');
    }
}
