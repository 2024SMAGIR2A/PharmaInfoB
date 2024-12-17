<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Medicament extends Model
{
    use HasFactory;

    protected $table = 'medicaments';

    protected $fillable = [
        'nom',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'id_medicament');
    }
}
