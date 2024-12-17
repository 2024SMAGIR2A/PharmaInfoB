<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'pharmacies';

    // Spécifiez la clé primaire
    protected $primaryKey = 'id_pharmacie';

    // Si la clé primaire n'est pas un entier incrémenté, ajoutez cette ligne
    public $incrementing = true; // ou false si ce n'est pas incrémental
    protected $keyType = 'int'; // ou 'string' si c'est une clé de type chaîne

    // Colonnes autorisées pour le remplissage massif
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'horaires_ouverture',
        'services_offerts',
        'moyens_paiement',
        'est_de_garde',
        'latitude',
        'longitude',
        'id_pharmacien',
    ];
}
