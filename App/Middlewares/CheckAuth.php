<?php


namespace App\Middlewares;


class CheckAuth {
    public function handle(){

        if (!auth ()->isLoggedIn ()){
            //return header ('Location:'. site_url ());
            return header ("Location: " . site_url('login'));
        }
        return true;
    }
}