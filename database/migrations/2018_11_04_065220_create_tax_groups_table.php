<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('tax_name')->index()->nullable();
            $table->double('tax')->nullable();
            $table->enum('Type',['Percentage','Fixed'])->index()->nullable();
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
        Schema::dropIfExists('tax_groups');
    }
}
