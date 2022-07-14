<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order_id')->unsigned()->unique();
            $table->string('mark')->nullable();
            $table->string('model')->nullable();
            $table->year('year')->nullable();
            $table->integer('run')->unsigned()->nullable();
            $table->string('color')->nullable();
            $table->string('body_type')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('gear_type')->nullable();
            $table->integer('generation_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
