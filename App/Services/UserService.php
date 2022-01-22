<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public array $user = [];

    public function __construct(Array $user)
    {
        $this->user = $user;
    }

    public function userRegistration()
    {
        if ($this->user){
            try {
                $user = User::create([
                    'name' => $this->user["user-name"],
                    'password' => md5($this->user["user-password"]),
                    'first-name' => $this->user["user-first-name"],
                    'last-name' => $this->user["user-last-name"],
                    'phone' => $this->user["user-phone"],
                    'adress' => $this->user["user-adress"],
                    'email' => $this->user["user-email"],
                    'role' => $this->user["user-role"],
                ]);
                return 1;
            }catch (\PDOException $e){
                return $e->getMessage();
            }
        }
        return 0;
    }

    public function userUpdate()
    {
        if ($this->user){
            try {
                 User::where('id', '=', $this->user['user-id'])
                    ->update([
                    'name' => $this->user["user-name"],
                    'first-name' => $this->user["user-first-name"],
                    'last-name' => $this->user["user-last-name"],
                    'phone' => $this->user["user-phone"],
                    'adress' => $this->user["user-adress"],
                    'email' => $this->user["user-email"],
                    'role' => $this->user["user-role"],
                ]);
                 return 1;
            }catch (\PDOException $e){
                return $e->getMessage();
            }
        }
        return 0;
    }

    public static function userDeleting($userId){

            $user = User::find($userId);
            $user->delete();
            return 1;

    }

    public static function ShowUserName($userId)
    {
        $isNumeric = true;
        is_numeric($userId) ? '' : $isNumeric = false;

        if ($isNumeric){
            $user = User::where('id', '=', $userId)->first();
            return empty($user) ? 'Bir Hata Oluştu' : $user['name'];
        }else{
            return "Bir Hata Oluştu";
        }
    }
}