<?php
// Routes File
$app->router->any ('/', 'Home@main', ['before' => 'CheckAuth']);


$app->router->group('department', function ($router){
    $router->any('settings' , 'DepartmentController@settings');
    $router->post('settings/save' , 'DepartmentController@settingsSave');
    $router->post('settings/edit' , 'DepartmentController@settingsEdit');
    $router->post('get/department-info', 'DepartmentController@getDeparmtentInfo');
}, ['before' => 'CheckAuth']);

$app->router->group('user', function ($router){
    $router->any('settings', "UserController@userSettings");
    $router->any('new-user', "UserController@userNew");
    $router->get('delete-user/:id', "UserController@userDelete");
    $router->any('edit-user', "UserController@userEdit");
    $router->post('get/user-info', 'UserController@getUserInfo');
    $router->get('get/user-infos/:any', 'UserController@UserInfoGet');

}, ['before' => 'CheckAuth']);

$app->router->group('store', function ($router){
        $router->any('/', 'StoreController@main');
        $router->any('new-store-category', 'StoreController@newStoreCategory');
        $router->any('new-car-part', 'StoreController@newCarPart');
        $router->any('edit-car-part', 'StoreController@editCarPart');
        $router->any('edit-car-part/update', 'StoreController@UpdateEditCarPart');
        $router->post('new-store-category/edit', 'StoreController@editStoreCategory');
        $router->get('delete-store-category/:id', 'StoreController@deleteCategory');
        $router->post('new-store-category/create', 'StoreController@CreateStoreCategory');
        $router->get('get/category-info/:id', 'StoreController@GetCategoryInfo');
        $router->any('car-part-info/get/:any', 'StoreController@GetCarPartInfo');

        $router->any('new-car-part/create', 'StoreController@CarPartCreate');
}, ['before' => 'CheckAuth']);

$app->router->group('car', function ($router){
    $router->get('/', 'CarController@main');
    $router->get('new-car', 'CarController@NewCar');
    $router->post('new-car/create', 'CarController@NewCarCreate');
    $router->get('edit-car', 'CarController@EditCar');
    $router->post('edit-car/continue', 'CarController@EditCarContinue');
    $router->get('get/brand/:id', 'CarController@GetModelList');
    $router->get('get/info/:any', 'CarController@GetCarInfo');
    $router->post('get/info', 'CarController@CarInfo');


},['before' => 'CheckAuth']);

$app->router->group('customer', function ($router){
    $router->get('get/customer-info/:any', 'CustomerController@CustomerInfo');
});

$app->router->group('orders', function ($router){
    $router->get('/', 'OrderControllers@main');
    $router->any('new-order', 'OrderControllers@NewOrder');
    $router->get('get/order-info/:any', 'OrderControllers@OrderInfo');
    $router->any('list-orders', 'OrderControllers@OrderList');
    $router->get('edit-order/:id', 'OrderControllers@EditOrder');
    $router->post('edit-order', 'OrderControllers@EditOrderUpdate');

},['before' => 'CheckAuth']);

$app->router->group('master', function ($router){
    $router->any('/on-hold-order', 'MasterController@OnHoldOrder');
    $router->any('/repair-order', 'MasterController@RepairOrder');
    $router->any('/complated-order', 'MasterController@ComplatedOrder');
    $router->any('/cancel-order', 'MasterController@CancelOrder');
    $router->any('/order/detail/:id', 'MasterController@DetailMaster');
    $router->any('/order/detail/update', 'MasterController@DetailUpdate');

},['before' => 'CheckAuth']);

$app->router->any ('/login', 'Auth@login');
$app->router->any ('/register', 'Auth@register', ['before' => 'CheckAuth']);
$app->router->any ('/logout', 'Auth@logout');

$app->router->get ('/api/posts', 'Api@posts');

$app->router->error (function () {
    die("<h3>Sayfa bulunamadı</h3>");
});

