<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $fillable = ['nom', 'prenom' , 'email' , 'password'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }


    use HasFactory;
}
