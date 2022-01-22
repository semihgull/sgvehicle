<?php

namespace App\models;


class PartsStorage extends \Core\Model
{

    protected $table = 'parts_storage';
    protected $fillable = [
        'parts-name',
        'parts-code',
        'parts-category',
        'parts-quantity',
        'parts-price'
    ];

}