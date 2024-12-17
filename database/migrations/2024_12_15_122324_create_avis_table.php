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
        Schema::create('avis', function (Blueprint $table) {
            $table->id('id_avis');
            $table->unsignedBigInteger('id_pharmacie')->constrained('pharmacies')->onDelete('cascade');
            $table->unsignedBigInteger('id_utilisateur')->constrained('utilisateurs')->onDelete('cascade');
            $table->text('commentaire');
            $table->integer('evaluation')->check('evaluation BETWEEN 1 AND 5');
            $table->timestamp('date_avis')->useCurrent();
            $table->boolean('modere')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
