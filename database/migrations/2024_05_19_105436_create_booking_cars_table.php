<?php

use App\Enum\OrderStatusEnum;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Car::class);
            $table->string('phone_number');
            $table->date('booking_date');
            $table->unsignedTinyInteger('lease_term');
            $table->string('destination');
            $table->unsignedTinyInteger('order_status')->default(OrderStatusEnum::CONFIRMATION->value);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_cars');
    }
};
