<?php

namespace App\controllers;

use App\Classes\CheckUser;
use App\Models\User;
use App\Services\UserService;
use Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use function Symfony\Component\String\s;

class UserController extends Controller
{
    private bool $isRegistiration = false;
    
    public function userSettings(){
        $users = User::all();
        return $this->view('users.users', ["users" => $users]);
    }

    public function userNew(Request $request): string{
        if ($request->isMethod("POST")){
            $registration = false;
            $this->validator->rule('required', ['user-first-name', 'user-last-name', 'user-name', 'user-email', 'user-password', 'user-adress', 'user-phone']);
            $this->validator->rule('lengthMin', ['user-first-name', 'user-last-name', 'user-name', 'user-adress'], 3);
            $this->validator->rule('email', ['user-email']);
            $this->validator->rule('regex', ['user-phone'], '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/');
            $this->validator->labels([
                'user-first-name' => 'İsim',
                'user-last-name' => 'Soyisim',
                'user-name' => 'Kullanıcı Adı',
                'user-email' => 'Email',
                'user-password' => 'Kullanıı Şifre',
                'user-adress' => 'Adres',
                'user-phone' => "Telefon Numarası"]);

            if ($this->validator->validate()){
                $checkUser = new CheckUser();
                $checkUser->checkUserName($request->get('user-name')) ? $registration=true : $this->validator->error( 'user-name','Kullanıcı Adı Kullanılıyor. Başka bir kullanıcı adı deneyin.');
                $checkUser->checkUserEmail($request->get('user-email')) ? $registration=true  : $this->validator->error( 'user-email','Kayıtlı Mail Adresi. Başka Bir Mail Deneyin');
                $checkUser->checkUserPhone($request->get('user-phone')) ? $registration=true : $this->validator->error( 'user-phone','Kayıtlı Telefon Numarası');
                if ($registration){
                    $userService = new UserService($this->validator->data());
                    $userRegistration = $userService->userRegistration();
                    if ($userRegistration){
                        $isRegistiration = true;
                        return $this->view('users.new', ["isRegistiration" => $isRegistiration]);
                    }
                }

            }
        }
        return $this->view('users.new');
    }

    public function userDelete($userId){
        $isInteger = false;
        is_numeric($userId) ? $isInteger = true : '';

        if ($isInteger){
            $user = CheckUser::checkUserId($userId);
            $userDeleting = UserService::userDeleting($userId);
            if ($userDeleting){
                echo redirect(site_url('user/settings'))->send();
            }
        }
    }

    public function userEdit(Request $request)
    {

        $users = User::where('role', '!=', 9)->get();

        if ($request->isMethod("POST")){
            $isUpdating = false;
            $this->validator->rule('required', ['user-first-name', 'user-last-name', 'user-name', 'user-email', 'user-adress', 'user-phone', 'user-id']);
            $this->validator->rule('lengthMin', ['user-first-name', 'user-last-name', 'user-name', 'user-adress'], 3);
            $this->validator->rule('email', ['user-email']);
            $this->validator->rule('regex', ['user-phone'], '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/');
            $this->validator->labels([
                'user-first-name' => 'İsim',
                'user-last-name' => 'Soyisim',
                'user-name' => 'Kullanıcı Adı',
                'user-email' => 'Email',
                'user-adress' => 'Adres',
                'user-phone' => "Telefon Numarası"]);

            if ($this->validator->validate()){

                $isUpdating = true;
                if ($isUpdating){
                    $userService = new UserService($this->validator->data());
                    $userService->userUpdate();
                    return $this->view('users.edit', ['users' => $users, 'isUpdating' => $isUpdating]);

                }
            }
        }
        return $this->view('users.edit', ['users' => $users]);

    }

    public function getUserInfo(Request $request)
    {
        $this->validator->rule('required', ['userId']);

        if ($this->validator->validate()){
            return User::where('id', '=', $request->get('userId'))->first();
        }
        return false;
    }

}