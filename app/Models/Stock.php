<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $primaryKey = 'id_stocks';

    protected $fillable = [
        'id_pharmacie',
        'id_medicament',
        'quantite',
    ];

    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_pharmacie');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'id_medicament');
    }
}

