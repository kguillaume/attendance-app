<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'tribu_id',
        'eglise_id',
        'date_entree_membre',
        'lieu_habitation',
        'statut_bapteme',
        'numero_cellulaire',
        'statut_matrimonial',
        'date_anniversaire',
        'photo_path',
        'user_id'
    ];
}
