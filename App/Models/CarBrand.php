<?php

namespace App\models;

class CarBrand extends \Core\Model
{
    protected $table = 'brand';
    protected $fillable = [
        'code',
        'title'
    ];
}