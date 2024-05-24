<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('car_class');
            $table->string('brand');
            $table->string('color');
            $table->unsignedTinyInteger('engine_type');
            $table->unsignedInteger('engine_power');
            $table->unsignedTinyInteger('wheel_drive');
            $table->decimal('zero_to_full',3,1);
            $table->unsignedInteger('price');
            $table->string('image_path')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
