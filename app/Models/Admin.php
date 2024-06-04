<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nom', 'prenom' , 'email' , 'password' , 'filiere_id'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    use HasFactory;
}
