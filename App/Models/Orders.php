<?php

namespace App\models;

class Orders extends \Core\Model
{

    protected $table = 'orders';
    protected $fillable = [
        'car-km',
        'customer-complaint',
        'related-master',
        'masters-opinion',
        'customer-id',
        'car-id',
        'order-status',
    ];
}