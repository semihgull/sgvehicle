<?php

namespace App\models;

class Customer extends \Core\Model
{
    protected $table = 'customer';
    protected $fillable = [
        'customer-fullname',
        'customer-address',
        'customer-phone',
        'customer-email',
        'customer-id-number'
    ];
}