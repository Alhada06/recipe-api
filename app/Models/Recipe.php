<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Recipe extends Model
{
//    public $incrementing = false;
    protected $connection = 'mongodb';
    protected $table='recipes';
    protected $fillable = ['name','ingredients','instructions', 'servings', 'rating',
            'prepTimeMinutes',
            'cookTimeMinutes',
            'image',
            'cuisine',
            'difficulty'];

    protected $casts= ['ingredients' => 'array','instructions' => 'array'];
}
