<?php

namespace App\Services;

use App\models\PartsCategories;
use App\models\PartsStorage;

class StoreService
{

    public static function CountCatgory(){
        return count(PartsCategories::all());
    }

    public static function CountPart()
    {
        return count(PartsStorage::all());
    }


}