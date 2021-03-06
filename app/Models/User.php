<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all user totals such as revenu and depenses
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function totals()
    {
        return $this->hasOne(Total::class, 'id_user');
    }

    /**
     * Get all user revenu sources
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sources()
    {
        return $this->hasMany(Source::class, 'id_user');
    }

    /**
     * Get all user active revenu
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function revenus()
    {
        return $this->hasMany(Revenu::class, 'id_user');
    }

    /**
     * Get all user depense
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function depenses()
    {
        return $this->hasMany(Depense::class, 'id_user');
    }

    /**
     * Get all user approvsionnements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvisionnements()
    {
        return $this->hasMany(Approvisionnement::class, 'id_user');
    }

    /**
     * Get all user projects
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projets()
    {
        return $this->hasMany(Projet::class, 'id_user');
    }
}
