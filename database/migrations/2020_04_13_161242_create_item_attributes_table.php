<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('attribute_value_id');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('item_attributes');
    }
}
