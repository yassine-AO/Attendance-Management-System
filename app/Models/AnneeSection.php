<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeSection extends Model
{
    protected $fillable = ['annee', 'filiere_id'];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }



    use HasFactory;
}
