<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reparation extends Model
{
    protected $fillable = [
        'id', 'model_id', 'title', 'image', 'description', 'symptomes', 'garantie', 'temps_reparation', 'prix'
    ];

    public function model(){
        return $this->belongsTo(Smartphone::class);
    }
}
