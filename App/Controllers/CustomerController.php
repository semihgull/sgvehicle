<?php

namespace App\Controllers;

use App\models\Customer;
use App\Models\User;
use Core\Controller;

class CustomerController extends Controller
{
    public function CustomerInfo($customerPhone){
        $isUser = false;
        $matched = preg_match('/[0-9]{3} [0-9]{3} [0-9]{4}$/', $customerPhone);
        if($matched){
            $user = Customer::where('customer-phone', '=', $customerPhone)->get();
            count($user) > 0 ? $isUser = true : 'a';
            if ($isUser){
                return $user;
            }
            return json_encode(["error" => "Kayıtlı Kullanıcı Yok!"]);
        }
    }
}