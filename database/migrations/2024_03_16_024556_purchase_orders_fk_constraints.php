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
        Schema::table('purchase_order', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('user');
            $table->foreign('id_purchase_request')->references('id')->on('purchase_request');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_order', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_purchase_request']);
        });
    }
};
