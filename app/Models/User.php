<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

    // Table associée
    protected $table = 'users';

    // Clé primaire personnalisée
    protected $primaryKey = 'id_utilisateur';

    // La clé primaire est incrémentée
    public $incrementing = true;

    // Type de la clé primaire
    protected $keyType = 'int';

    // Colonnes autorisées pour le remplissage massif
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Colonnes à masquer lors de la sérialisation
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts pour les attributs
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
