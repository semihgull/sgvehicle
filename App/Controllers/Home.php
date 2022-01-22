<?php


namespace App\Controllers;


use App\models\Orders;
use App\models\PartsStorage;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Core\Controller;
use Core\Model;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\HttpFoundation\Request;
class Home extends Controller {
    public function main(){

        $posts = Post::all ();
        $orders = Orders::take(10)->get();
        $parts = PartsStorage::where('parts-quantity', '<' , 10)->get();

        return $this->view ('home', ['orders' => $orders, 'parts' => $parts]);

    }

    public function tarihler(){
        return Carbon::now ();
    }

}
