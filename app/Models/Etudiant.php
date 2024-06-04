<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['nom', 'prenom' ,
                            'email', 'password' ,'numTele' ,
                            'minutesRetard' , 'nbrAbsences' ,
                             'annee_section_id' ];

    public function annee_section()
    {
        return $this->belongsTo(AnneeSection::class);
    }

    public function retards()
    {
        return $this->hasMany(Retard::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }





    use HasFactory;
}
