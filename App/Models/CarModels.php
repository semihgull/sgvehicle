<?php

namespace App\models;

use Core\Model;

class CarModels extends Model
{

    protected $table = 'model';
    protected $fillable = [
        'brand_id',
        'code',
        'title'
    ];
}