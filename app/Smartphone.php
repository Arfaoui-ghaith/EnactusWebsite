<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    protected $fillable = [
        'name', 'image', 'brand_id'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function reparations(){
        return $this->hasMany(Reparation::class);
    }
}
