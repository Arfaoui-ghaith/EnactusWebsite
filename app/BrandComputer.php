<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandComputer extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function computers(){
        return $this->hasMany(Computer::class);
    }
}
