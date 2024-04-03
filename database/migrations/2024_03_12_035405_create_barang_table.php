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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            
            $table->string('asset_number')->unique();
            $table->string('item_name', 255);
            $table->string('warranty', 25);
            $table->date('exp_date_warranty');
            $table->enum('asset_condition', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->unsignedBigInteger('id_departemen'); // FK
            $table->unsignedBigInteger('id_brand'); // FK
            $table->unsignedBigInteger('id_category'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
