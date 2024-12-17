<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pharmacie',
        'id_utilisateur',
        'commentaire',
        'evaluation',
        'modere', // Si la colonne existe dans la table
    ];

    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_pharmacie');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}
