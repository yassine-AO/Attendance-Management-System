<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = ['annee_section_id'];

    public function annee_section()
    {
        return $this->belongsTo(AnneeSection::class);
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }
}
