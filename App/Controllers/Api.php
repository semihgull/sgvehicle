<?php


namespace App\Controllers;


use Symfony\Component\HttpFoundation\Response;

class Api {
        public function posts(Response $response){
            $posts = db ('posts')->get ();
            
            return redirect (site_url ())->with ('İşlemler Başarılı!');

            /*$response->setStatusCode ('200');
            $response->headers->set ('Content-type', 'application/json');
            $response->setContent ($posts);
*/
            $response->send ();
        }
}