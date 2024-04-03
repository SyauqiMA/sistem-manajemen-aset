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
        Schema::table('pembelian', function (Blueprint $table) {
            $table->foreign('id_purchase_order')->references('id')->on('purchase_order');
            $table->foreign('id_supplier')->references('id')->on('supplier');
            $table->foreign('id_invoice')->references('id')->on('invoice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->dropForeign(['id_purchase_order']);
            $table->dropForeign(['id_supplier']);
            $table->dropForeign(['id_invoice']);
        });
    }
};
