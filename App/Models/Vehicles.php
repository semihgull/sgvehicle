<?php

namespace App\models;

class Vehicles extends \Core\Model
{
    protected $fillable = [
        'car-brand',
        'car-model',
        'car-chassis-number',
        'car-plate',
        'car-owner',
    ];
}