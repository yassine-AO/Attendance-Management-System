<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable = ['calendar_id','nom'];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
