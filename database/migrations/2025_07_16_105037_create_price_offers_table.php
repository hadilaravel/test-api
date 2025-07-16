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
        Schema::create('price_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertising_id')->constrained('advertisings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('price');
            $table->unsignedBigInteger('offer_id')->nullable()->unique();
            $table->tinyInteger('status')->default(0)->comment('0 => inactive , 1 => active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_offers');
    }
};
