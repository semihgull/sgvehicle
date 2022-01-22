<?php

namespace App\models;

class OrderStatusType extends \Core\Model
{
    protected $table = 'orderstatus';
    protected $fillable = [
        'status'
    ];
}