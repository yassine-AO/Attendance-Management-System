<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note', 'etudiant_id' , 'module_id'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }


    use HasFactory;
}
