<?php

namespace App\Services;

use App\models\CarBrand;
use App\models\CarModels;
use App\models\Vehicles;

class VehicleServices
{
    private array $data = [];
    public bool $processOk = true;
    public string $errorMessage = '';
    public bool $createOk = false;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function CheckCarPlate(){
        $vehicle = Vehicles::where('car-plate', '=', $this->data["car-plate"])->get();
        if (count($vehicle) > 0){
            $this->processOk = false;
            $this->errorMessage = "Kayıtılı Plaka";
        }
    }

    public function CheckChassisNumber()
    {
        $vehicle = Vehicles::where('car-chassis-number', '=', $this->data['car-chassis-number'])->get();
        if (count($vehicle) > 0){
            $this->processOk = false;
            $this->errorMessage = "Kayıtlı Şase Numarası";
        }
    }

    public function CreateVehicle($CustomerLastId){
        $vehicle = Vehicles::create([
            'car-plate' => $this->data['car-plate'],
            'car-chassis-number' => $this->data['car-chassis-number'],
            'car-brand' => $this->data['car-brand'],
            'car-model' => $this->data['car-model'],
            'car-owner' => $CustomerLastId
        ]);
        if ($vehicle){
            $this->createOk = true;
        }
    }

    public function VehicleLastId(){
        $vehicle = Vehicles::all();
        return $vehicle->last()["id"];
    }

    public static function GetBrandName($carBrand)
    {
        $carBrand = CarBrand::where('id', '=', $carBrand)->first();
        return $carBrand["title"];

    }

    public static function CheckIdCar($carId){
        $vehicle = Vehicles::find($carId);
        return is_object($vehicle) ? 1 : 0;

    }

    public static function GetModelName($carModel)
    {
        $carModel = CarModels::where('id', '=', $carModel)->first();
        return $carModel["title"];

    }

    public static function VehicleCounter()
    {
        $vehicles = Vehicles::all();
        return count($vehicles);
    }

    public static function CheckCarAllData($carInfo)
    {
        $vehicle = Vehicles::where('car-chassis-number', '=', $carInfo)->orWhere('car-plate', '=', $carInfo)->first();
        if ($vehicle){
            return $vehicle;
        }
        return 0;
    }


}