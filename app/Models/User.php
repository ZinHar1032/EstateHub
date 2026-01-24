<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   protected $fillable = [
    'nom_complet',
    'email',
    'tel',
    'ville',
    'role',
    'password',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relations
     * Un user (role agent/admin) peut gérer plusieurs proprietes
     */
    public function proprietes()
    {
        return $this->hasMany(Propriete::class, 'user_id');
    }
    public function rendezVousProprietes()
{
    return $this->hasMany(RendezVousPropriete::class);

}
 public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

}
