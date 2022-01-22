<?php

namespace App\Services;

use App\models\OrderStatusType;

class OrderStatusService
{

    protected static int $id = 0;
    protected static object $status;
    protected static bool $isStatus = false;

    public static function StatusName($id)
    {
        self::$id = $id;
        self::CheckStatus();
        return self::$isStatus ? self::$status['status'] : 'Bir Hata Oluştu';
    }

    private static function CheckStatus(){
        $status = OrderStatusType::where('id', '=', self::$id)->first();
        if (!empty($status)){
            self::$status = $status;
            self::$isStatus = true;
        }
        return false;
    }

    /**
     *
     */
    public static function OrderStatusType()
    {
        $status = OrderStatusType::all();

        foreach ($status as $item){
            echo '<option value="'.$item['id'].'">'.$item['status'].'</option>';
        }
    }

}