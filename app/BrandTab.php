<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandTab extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function tablettes(){
        return $this->hasMany(Tablette::class);
    }
}
