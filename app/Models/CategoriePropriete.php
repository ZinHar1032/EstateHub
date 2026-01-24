<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePropriete extends Model
{
    use HasFactory;

    protected $table = 'categorie_proprietes';

    protected $fillable = [
        'nom_categorie',
        'actif',
        'dispo',
    ];

    public function proprietes()
    {
        return $this->hasMany(Propriete::class);
    }
}
