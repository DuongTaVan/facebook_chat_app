<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->string('icon')->nullable();
            $table->string('icon_size')->nullable();
            $table->string('background_icon')->nullable();
            $table->string('icon_color')->nullable();
            $table->string('locator')->nullable();
            $table->string('language')->nullable();
            $table->string('tab_style')->nullable();
            $table->string('tab_text')->nullable();
            $table->string('button_style')->nullable();
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
        Schema::drop('settings');
    }
}
