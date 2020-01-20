<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'first_title', 'title', 'image', 'description', 'goals'
    ];
}
