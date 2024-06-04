<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['nom', 'adresse'];
    public function filiere()
    {
        return $this->hasMany(Filiere::class);
    }


    use HasFactory;
}
