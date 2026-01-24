<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePropriete extends Model
{
    use HasFactory;

    protected $table = 'type_proprietes';

    protected $fillable = [
        'nom_type',
        'description',
        'actif',
    ];

    public function proprietes()
    {
        return $this->hasMany(Propriete::class);
    }
}
