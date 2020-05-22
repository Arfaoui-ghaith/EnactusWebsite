<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function smartphones(){
        return $this->hasMany(Smartphone::class);
    }

    
}
