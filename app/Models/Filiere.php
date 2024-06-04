<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['nom', 'campus_id'];
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function anneeSection()
    {
        return $this->hasMany(AnneeSection::class);
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }


    use HasFactory;
}
