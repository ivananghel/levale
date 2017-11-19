<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tablecolorgroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_color', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('status')->nullable();
            $table->text('group_color')->nullable();
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
        hema::dropIfExists('tags');
    }
}
