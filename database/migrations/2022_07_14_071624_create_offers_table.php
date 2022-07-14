<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', static function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order_id')->unsigned()->unique();
            $table->string('mark')->nullable();
            $table->string('model')->nullable();
            $table->string('generation')->nullable();
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
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
