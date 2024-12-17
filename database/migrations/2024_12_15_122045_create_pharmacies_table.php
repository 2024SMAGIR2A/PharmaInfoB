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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id('id_pharmacie');
            $table->string('nom');
            $table->text('adresse');
            $table->string('telephone', 15)->nullable();
            $table->text('horaires_ouverture')->nullable();
            $table->text('services_offerts')->nullable();
            $table->text('moyens_paiement')->nullable();
            $table->boolean('est_de_garde')->default(false);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamp('date_ajout')->useCurrent();
            $table->unsignedBigInteger('id_pharmacien')->nullable()->constrained('utilisateurs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
