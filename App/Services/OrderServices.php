<?php

namespace App\Services;

use App\models\Orders;
use App\models\OrderStatusType;
use App\Models\User;

class OrderServices
{

    private static object $orders;
    private static bool $isOrder = false;

    /**
     * @return false
     */
    public static function EmployeeList()
    {
        $users = User::where('role', '=', 7)->get();
        if ($users){
            foreach ($users as $user){
                echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
            }
        }
        return false;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function CreateOrder($data)
    {
        $order = Orders::create([
            'car-km' => $data->get('car-km'),
            'customer-complaint' => $data->get('customer-complaint'),
            'related-master' => $data->get('related-master'),
            'masters-opinion' => $data->get('masters-opinion'),
            'customer-id' => $data->get('customer-id-input'),
            'car-id' => $data->get('car-id-input'),
            'order-status' => 1
        ]);
        return $order;
    }

    /**
     * @param $orderId
     * @return false
     */
    public static function OrderCheck($orderId){
        $isNumeric = false;

        is_numeric($orderId) ? $isNumeric = true : '';

        if ($isNumeric){
            $orders = Orders::where('id', '=', $orderId)->first();
            return !empty($orders) ? $orders : false;
        }
        return false;
    }

    /**
     * @param $orderId
     * @param $orderStatus
     * @return int|void
     */
    public static function OrderUpdate($orderId, $orderStatus){
        $orderUpdate = Orders::where('id', '=', $orderId)
                        ->update([
                            'order-status' => $orderStatus
                        ]);
        if ($orderUpdate){
            return 1;
        }
    }

    private static function GetOrders(){
        self::$orders = Orders::all();
        count(self::$orders) > 0 ? self::$isOrder = true : '';

    }

    /**
     * @return int|string
     */
    public static function CountOrder(string $type){
        self::GetOrders();
        /**
         * $type
         * 1- Beklemede -onHold
         * 2- Tamir aşamasında - repair
         * 3- Tamamlandı - complated
         * 4- iptal Edildi - cancel
         */
        switch ($type){
            case 'onhold':
                return self::CountOnHold();
                break;
            case 'repair':
                return self::CountRepair();
                break;
            case 'complated':
                return self::CountComplated();
                break;
            case 'cancel':
                return self::CountCancel();
                break;
            case 'all':
                return self::CountAll();
                break;
            default:
                return "Beklenmeyen talep";

        }
        //return count($orders) > 0 ? count($orders) : 'Bir Hata Oluştu';
    }

    /**
     * @return int
     */
    protected static function CountOnHold(){
        $orderCount = 0;
        foreach (self::$orders as $order){
            if ($order['order-status']  == 1 ){
                $orderCount++;
            }
        }
        return $orderCount;
    }

    /**
     * @return int
     */
    private static function CountRepair(){
        $orderCount = 0;

        foreach (self::$orders as $order){
            if ($order['order-status']  == 2 ){
                $orderCount++;
            }
        }
        return $orderCount;

    }

    /**
     * @return int
     */
    private static function CountComplated(){
        $orderCount = 0;

        foreach (self::$orders as $order){
            if ($order['order-status']  == 3 ){
                $orderCount++;
            }
        }
        return $orderCount;

    }

    /**
     * @return int
     */
    private static function CountCancel(){
        $orderCount = 0;
        foreach (self::$orders as $order){
            if ($order['order-status']  == 4){
                $orderCount++;
            }
        }
        return $orderCount;
    }

    /**
     * @return int
     */
    private static function CountAll(){
        return count(self::$orders);
    }

}