<?php
// Helper files

/**
 * @param      $key
 * @param null $default
 *
 * @return mixed|null
 */
function env_($key, $default = null)
{
    return \Arrilot\DotEnv\DotEnv::get($key, $default);
}

/**
 * @return \Core\Auth
 */

function auth(){
    return \Core\Auth::getInstance ();
}

/**
 * @param $name
 *
 * @return \Core\Upload
 */

function upload($name){
     return \Core\Upload::getInstance ($name);
}

/**
 * @param $table
 *
 * @return \Illuminate\Database\Query\Builder
 */

function db($table) :\Illuminate\Database\Query\Builder{
    return \Illuminate\Database\Capsule\Manager::table ($table);
}

/**
 * @param null $url
 *
 * @return \Core\Redirect
 */
function redirect($url = null): \Core\Redirect{
    return \Core\Redirect::getInstance ($url);
}

/**
 * @param $name
 *
 * @return false|mixed
 */
function msg($name){
    if (isset($_COOKIE[$name])){
        return $_COOKIE[$name];
    }
    return false;
}

/**
 * @param string $url
 *
 * @return string
 */
function site_url($url = ''){
    return env_ ('BASE_URL') . '/' . $url;
}

/**
 * @param string $url
 *
 * @return string
 *
 */
function assets_url($url = ''){

    return site_url ('public/assets/' . $url);

}

/**
 * @param $files
 * @param $number
 * @return array
 */
function fileEdit($files, $number){
    $myFiles = [];
    for ($i = 0; $i <= $number; $i++){
        $myFiles['name']    =   $files['name'][$number];
        $myFiles['tmp_name']    =   $files['tmp_name'][$number];
        $myFiles['size']    =   $files['size'][$number];
        $myFiles['type']    =   $files['type'][$number];
        $myFiles['error']    =   $files['error'][$number];
    }
    return $myFiles;
}

/**
 * @param int $role
 * @return string|void
 */
function getRoleName($role){
    if ($role == 9) {
        return "Yönetici";
    } elseif ($role == 8) {
        return "Depocu";
    } elseif ($role == 7) {
        return "Usta";
    } elseif ($role == 6) {
        return "Sekreter";
    } else {
        return "Bilinmiyor";
    }
}
