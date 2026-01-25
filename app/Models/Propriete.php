<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;

    protected $table = 'proprietes';

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'surface',
        'nb_chambres',
        'nb_salle_bain',
        'adresse',
        'ville',
        'parking',
        'statut',
        'valide',
        'user_id',
        'type_propriete_id',
        'categorie_propriete_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typePropriete()
    {
        return $this->belongsTo(TypePropriete::class, 'type_propriete_id');
    }

    public function categoriePropriete()
    {
        return $this->belongsTo(CategoriePropriete::class, 'categorie_propriete_id');
    }

    public function images()
    {
        return $this->hasMany(ImagePropriete::class);
    }

    public function rendezVousProprietes()
    {
        return $this->hasMany(RendezVousPropriete::class);
    }

    public function imagePrincipale()
    {
        return $this->hasOne(ImagePropriete::class)
            ->where('principale', true);
    }
}
