<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['nom', 'nbrHeures' , 'prof_id' , 'annee_section_id', 'day_id'];

    public function annee_section()
    {
        return $this->belongsTo(AnneeSection::class);
    }
    public function prof()
    {
        return $this->belongsTo(Prof::class);
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
