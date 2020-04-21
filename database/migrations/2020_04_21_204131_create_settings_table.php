<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('logo')->nullable();
            $table->text('about_home')->nullable();
            $table->text('main_about')->nullable();
            $table->text('about_image')->nullable();
            $table->text('footer')->nullable();
            $table->text('contact_text')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('feature1_icon')->nullable();
            $table->text('feature1_title')->nullable();
            $table->text('feature1_description')->nullable();
            $table->text('feature2_icon')->nullable();
            $table->text('feature2_title')->nullable();
            $table->text('feature2_description')->nullable();
            $table->text('feature3_icon')->nullable();
            $table->text('feature3_title')->nullable();
            $table->text('feature3_description')->nullable();
            $table->text('map')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();
            $table->text('android')->nullable();
            $table->text('apple')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
