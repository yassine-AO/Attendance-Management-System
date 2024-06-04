<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['motif', 'etudiant_id' , 'prof_id' , 'module_id'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    


    use HasFactory;
}
