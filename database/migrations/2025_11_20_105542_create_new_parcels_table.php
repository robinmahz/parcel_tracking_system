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
        Schema::create('new_parcels', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->text('recipient_details');
            $table->text('recipient_address');
            $table->string('booking_no')->unique();
            $table->string('reference_no')->nullable();
            $table->date('shipping_received_date')->nullable();
            $table->string('tracking_no')->nullable();
            $table->string('tracking_site')->nullable();
            $table->string('tracking_url')->nullable();
            $table->date('in_transit_date')->nullable();
            $table->string('transit_city')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_parcels');
    }
};
