<?php

namespace App\Services;

use App\models\CarBrand;
use App\models\CarModels;

class CarServices
{
    public static function ListCarBrand()
    {
        $brands = CarBrand::all();
        if ($brands){
            foreach ($brands as $brand){
                echo '<option value="'.$brand['id'].'">'.$brand['title'].'</option>';
            }
        }
        return false;
    }

    public static function IsBrand($id){
        $brand = CarBrand::where('id', '=', $id)->first();
        if ($brand){
            return $brand;
        }
        return false;
    }

    public static function GetModels($id){
        $models = CarModels::where('brand_id', '=', $id)->get();
        if (count($models) > 0){
            $models_JSON = json_encode($models);
            return $models_JSON;
        }
        return json_encode(['error' => true]);
    }

}