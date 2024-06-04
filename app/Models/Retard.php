<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    protected $fillable = ['minutesRetard', 'motif' , 'etudiant_id' , 'module_id'];

    public function etudiantRetard()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }


    use HasFactory;
}
