<?php


namespace Core;


use App\Models\User;
use Aura\Session\Segment;
use Aura\Session\SessionFactory;
use function Symfony\Component\String\s;

class Auth {

    public Segment $segment;
    private static Auth $instance;

    public static function getInstance(){
            if (!isset(self::$instance)){
                self::$instance = new Auth();
            }
            return self::$instance;
    }

    public function __construct () {
        $session_factory = new SessionFactory();
        $session = $session_factory->newInstance ($_COOKIE);
        $this->segment = $session->getSegment ('SGBoilerplate\Auth');
    }

    public function login($data){
        $user = User::where('name' , $data['username'])->where('password', md5 ($data['password']))->first();
        if ($user){
            $this->create($user);
            return $user;
        }
        return false;
    }

    public function register($data){
        $data['password'] = md5($data['password']);
        $user =  User::create($data);
        if ($user){
            $this->create($user);
            return $user;
        }
        return false;
    }

    public function user_exist($name){
        return User::where('name', $name)->first();
    }

    public function create($data){

        $this->segment->set ('login', true);
        $this->segment->set ('name', $data->name);
        $this->segment->set ('fullname', $data['first-name'] . " " . $data['last-name']);
        $this->segment->set ('id', $data->id);
        $this->segment->set ('role', $data->role);
    }

    public function logout(){
        $this->segment->clear();
    }

    public function isLoggedIn(){
        return $this->segment->get ('login');
    }

    public function getId(){
        return $this->segment->get ('id');
    }
    public function getFullname(){
        return $this->segment->get ('fullname');
    }

    public function getName(){
        return $this->segment->get ('name');
    }

    public function getRole(){
        return $this->segment->get('role');
    }

    public function guard(){
        return $this;
    }

    public function guest(){
        return !$this->segment->get ('login');
    }

    public function check(){
        return $this->segment->get ('login');
    }
}