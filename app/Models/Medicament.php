<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $table = 'medicaments';
    protected $primaryKey = 'id_medicament';

    protected $fillable = [
        'nom',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'id_medicament');
    }
}
