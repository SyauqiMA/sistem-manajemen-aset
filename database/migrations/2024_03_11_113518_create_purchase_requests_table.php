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
        Schema::create('purchase_request', function (Blueprint $table) {
            $table->id();
            
            $table->string('purchase_request_number', 15)->unique();
            $table->date('purchase_request_date');
            $table->string('purchase_request_name', 50);
            $table->smallInteger('status');
            $table->unsignedBigInteger('id_user'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_request');
    }
};
