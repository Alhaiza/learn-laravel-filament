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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('good_id')->constrained('goods', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('facture_id')->constrained('factures', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('discount');
            $table->string('good_name');
            $table->bigInteger('price');
            $table->bigInteger('sub_total');
            $table->integer('quantity');
            $table->integer('quantity_result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
