<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tablette extends Model
{
    protected $fillable = [
        'name', 'image', 'brand_id'
    ];

    public function brand(){
        return $this->belongsTo(BrandTab::class);
    }
}
