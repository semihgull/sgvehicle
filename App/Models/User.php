<?php


namespace App\Models;


use Core\Model;

class User extends Model {

    protected $fillable = [
        'name',
        'password',
        'role',
        'first-name',
        'last-name',
        'adress',
        'email',
        'phone'
    ];
    public function post(){
        return $this->hasMany (Post::class);
    }
}