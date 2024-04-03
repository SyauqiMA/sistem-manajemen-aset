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
        Schema::table('barang', function (Blueprint $table) {
            $table->foreign('id_departemen')->references('id')->on('departemen');
            $table->foreign('id_brand')->references('id')->on('brand');
            $table->foreign('id_category')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign(['id_departemen']);
            $table->dropForeign(['id_brand']);
            $table->dropForeign(['id_category']);
        });
    }
};
