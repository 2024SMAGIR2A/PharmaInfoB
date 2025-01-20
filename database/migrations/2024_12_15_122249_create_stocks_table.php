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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('id_stocks');
            $table->unsignedBigInteger('id_pharmacie')->constrained('pharmacies')->onDelete('cascade');
            $table->unsignedBigInteger('id_medicament')->constrained('medicaments')->onDelete('cascade');
            $table->integer('quantite')->check('quantite >= 0');
            $table->primary(['id_pharmacie', 'id_medicament']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
