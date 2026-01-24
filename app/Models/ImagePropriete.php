<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePropriete extends Model
{
    use HasFactory;

    protected $table = 'image_proprietes';

    protected $fillable = [
        'propriete_id',
        'chemin_image',
        'principale',
        'ordre',
    ];

    /**
     * Relation : une image appartient à une propriété
     */
    public function propriete()
    {
        return $this->belongsTo(Propriete::class);
    }
}
