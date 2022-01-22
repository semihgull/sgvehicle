<?php

namespace App\Classes;

use App\Models\User;
use Core\Bootstrap;

class CheckUser extends Bootstrap
{
    /**
     * @param string $username
     * @return int
     */
    public function checkUserName(string $username){
        $user = User::where('name', $username)->first();
        if ($user){
            return 0;
        }
        return 1;
    }

    /**
     * @param string $userEmail
     * @return int
     */
    public function checkUserEmail(string $userEmail){
        $user = User::where('email', $userEmail)->first();
        if ($user){
            return 0;
        }
        return 1;
    }

    /**
     * @param string $userPhone
     * @return int
     */
    public function checkUserPhone(string $userPhone){
        $user = User::where('phone', $userPhone)->first();
        if ($user){
            return 0;
        }
        return 1;
    }

    /**
     * @param int $id
     * @return int
     */
    public static function checkUserId(int $id)
    {
        $user = User::find($id);
        if ($user){
            return 1;
        }
        return 0;
    }
}