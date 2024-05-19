<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id')->nullable();
            $table->unsignedBigInteger('time')->default(0);
            $table->foreign('app_id')->references('id')->on('apps')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_times');
    }
};
