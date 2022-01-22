<?php

namespace App\Services;

use App\models\Vehicles;

class VehicleInfoServices
{

    public static $vehicle = '';
    public static bool $error = false;

    public static function ShowCar($carId, $type){
        $isNumeric = false;
        is_numeric($carId) ? $isNumeric = true : $isNumeric = false;
        if ($isNumeric){
            self::CheckCar($carId);
        }
        if (!empty(self::$vehicle)){
            switch ($type){
                case 'brand':
                    return self::ShowBrand();
                    break;
                case 'model':
                    return self::ShowModel();
                    break;
                case 'chassis-number':
                    return self::ShowChassisNumber();
                    break;
                case 'plate':
                    return self::ShowPlate();
                    break;
                case 'owner':
                    return self::ShowOwner();
                    break;
                case 'last-change':
                    return self::ShowLastChange();
                    break;
            }
        }
    }

    public static function CheckCar($carId){
        $vehicle = Vehicles::where('id', '=', $carId)->first();
        return empty($vehicle) ? self::$error = true : self::$vehicle = $vehicle;
    }

    private static function ShowModel(){
        return VehicleServices::GetModelName(self::$vehicle['car-model']);
    }

    private static function ShowBrand(){
        return VehicleServices::GetBrandName(self::$vehicle['car-brand']);

    }

    private static function ShowChassisNumber(){
        return self::$vehicle['car-chassis-number'];

    }

    private static function ShowPlate(){
        return self::$vehicle['car-plate'];

    }

    private static function ShowOwner(){
        return CustomerServices::GetCustomerName(self::$vehicle['car-owner']);
    }

    private static function ShowLastChange(){
        return self::$vehicle['updated_at'];
    }
}