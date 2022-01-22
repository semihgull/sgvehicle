<?php


namespace App\Controllers;


use Core\Controller;
use Symfony\Component\HttpFoundation\Request;

class Auth extends Controller {
        public function login(Request $request){
            if ($request->isMethod ('POST')){
                $this->validator->rule ('required', ['username']);
                $this->validator->labels ([
                    'username' => 'Kullanıcı Adı'
                ]);

                if ($this->validator->validate ()){
                    $user = auth ()->login($this->validator->data ());

                    if ($user){

                        return redirect ()->send();
                    }else{
                        $this->validator->error ('error', 'Kullanıcı Adı veya Şifre Hatalı');
                    }
                }
            }

           return $this->view ('auth.login');
        }

        public function register(Request $request){
            
            if ($request->isMethod ('POST')){
                $this->validator->rule ('required', ['name', 'password']);
                $this->validator->labels ([
                    'name' => 'Kullanıcı Adı',
                    'password' => 'Şifre'
                ]);
                if ($this->validator->validate ()){
                    
                    $data = $this->validator->data ();
                    if (auth ()->user_exist ($data['name'])){
                        $this->validator->error ('error', sprintf ('%s adında bir kullanıcı var.', $data['name']));
                    }else{
                       $user = auth ()->register ($data);
                       if ($user){
                           return redirect ()->send ();
                       }else{
                           $this->validator->error ('error', 'Bir hata oluştu');
                       }
                    }

                }else{
                    return $this->validator->error ('error', 'Kullanıcı adı ve Şifre boş olamaz!');
                }
            }
            
            return $this->view ('auth.register');
        }

        public function logout(){
            auth()->logout();
            return redirect (site_url ())->send ();

        }
}