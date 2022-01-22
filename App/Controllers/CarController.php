<?php

namespace App\controllers;

use App\models\CarBrand;
use App\models\Vehicles;
use App\Services\CarServices;
use App\Services\CustomerServices;
use App\Services\VehicleServices;
use Symfony\Component\HttpFoundation\Request;

class CarController extends \Core\Controller
{

    /**
     * @return string
     */
    public function main(){

        $lastVehicles = Vehicles::take(10)->get();
        return $this->view('car.car', ['lastVehicles' => $lastVehicles]);
    }

    /**
     * @return string
     */
    public function NewCar(){
        return $this->view('car.new-car');
    }

    /**
     * @return string
     */
    public function NewCarCreate(Request $request){
        $this->validator->rule('required', [
            'customer-fullname',
            'customer-address',
            'customer-phone',
            'customer-email',
            'customer-id-number',
            'car-plate',
            'car-chassis-number',
            'car-brand',
            'car-model'
        ]);
        $this->validator->rules([
            'numeric' => ['car-brand', 'car-model'],
            'regex' => [['customer-phone', '/^[0-9]{3} [0-9]{3} [0-9]{4}$/']]
        ]);

        if ($this->validator->validate()){

            $isCustomer = false; // Müşteri Varsa true olur  ve işlem yapmaz
            $isCar = false; // Car varsa true olur

            $customer = [
                'customer-fullname' => $request->get('customer-fullname'),
                'customer-address' => $request->get('customer-address'),
                'customer-phone' => $request->get('customer-phone'),
                'customer-email' => $request->get('customer-email'),
                'customer-id-number' => $request->get('customer-id-number'),
            ];

            $CustomerServices = new CustomerServices($customer);

            $CustomerServices->CheckPhone();
            $CustomerServices->CheckIdNumber();

            if (!$CustomerServices->proccessOk){
                return $this->view('car.new-car', ['processOk' => 1, 'message' => $CustomerServices->errorMessage, 'type' => 'error']);
            }

            $car = [
                'car-plate' => $request->get('car-plate'),
                'car-chassis-number' => $request->get('car-chassis-number'),
                'car-brand' => $request->get('car-brand'),
                'car-model' => $request->get('car-model')
            ];

            $VehicleServices = new VehicleServices($car);

            $VehicleServices->CheckCarPlate();
            $VehicleServices->CheckChassisNumber();

            if (!$VehicleServices->processOk){
                return $this->view('car.new-car', ['processOk' => 1, 'message' => $VehicleServices->errorMessage, 'type' => 'error']);
            }

            $CustomerServices->CreateCustomer();
            if ($CustomerServices->createOk){
                $VehicleServices->CreateVehicle($CustomerServices->CustomerLastId());
                if ($VehicleServices->createOk){
                    return $this->view('car.new-car', ['processOk' => 1, 'message' => "Kayıt Başarılı", 'type' => 'success']);
                }
            }
        }

        return $this->view('car.new-car');

    }

    /**
     * @return string
     */
    public function EditCar(){
        return $this->view('car.edit-car');
    }

    /**
     * @return string
     */
    public function EditCarContinue(Request $request){
        $this->validator->rule('required', [
            'car-id-edit',
            'car-plate-edit',
            'car-chassis-number-edit',
            'car-brand-edit',
            'car-model-edit'
        ]);

        if ($this->validator->validate()){
            $isVehicle = false;
            $vehicle = VehicleServices::CheckIdCar($request->get('car-id-edit'));
            ($vehicle > 0) ? $isVehicle = true : $isVehicle= false;

            if ($isVehicle){
                try {
                    $update = Vehicles::where('id', '=', $request->get('car-id-edit'))->update(
                        [
                            'car-plate' => $request->get('car-plate-edit'),
                            'car-chassis-number' => $request->get('car-chassis-number-edit'),
                            'car-brand' => $request->get('car-brand-edit'),
                            'car-model' => $request->get('car-model-edit')
                        ]
                    );
                    return $this->view('car.edit-car', ['processOk' => 1, 'message' => 'Güncellendi', 'type' => 'success']);

                }catch (\Exception $e){
                    return $this->view('car.edit-car', ['processOk' => 1, 'message' => 'Güncellenemedi', 'type' => 'error']);
                }
            }else{
                return $this->view('car.edit-car', ['processOk' => 1, 'message' => 'Güncellenemedi', 'type' => 'error']);
            }
        }
    }

    /**
     * @param $id
     * @return false|string|void
     */
    public function GetModelList($id){
        $isNumeric = false;

        is_numeric($id) ? $isNumeric = true  : $isNumeric = false;
        if ($isNumeric){
            $isBrand = CarServices::IsBrand($id);
            $models = CarServices::GetModels($id);

            return $models;

        }
    }

    public function GetCarInfo($carInfo){

        $car = VehicleServices::CheckCarAllData($carInfo);
        if (is_object($car)){
            $modelName = VehicleServices::GetModelName($car['car-model']);
            $brandName = VehicleServices::GetBrandName($car['car-brand']);
            $response = json_encode(['car' => $car, 'modelName' => $modelName, 'brandName' => $brandName]);

        }else{
            $response = json_encode(['error' => 1]);

        }
        return $response;
    }

    public function CarInfo(Request $request){
        $searchType = $request->get('searchType');
        $isCar = false;
        if ($searchType == "car-plate"){
            $vehicle = Vehicles::where('car-owner', '=', $request->get('customerId'))
                                ->where('car-plate', '=', $request->get('data'))
                                ->get();
        }else if($searchType == "chassis-number"){
            $vehicle = Vehicles::where('car-owner', '=', $request->get('customerId'))
                                ->where('car-chassis-number', '=', $request->get('data'))
                                ->get();
        }


        count($vehicle) > 0 ? $isCar = true : $isCar = false;

        if (!$isCar){
            return json_encode(['error' => 1]);
        }

        $carBrandName = VehicleServices::GetBrandName($vehicle[0]["car-brand"]);
        $carModelName = VehicleServices::GetModelName($vehicle[0]["car-model"]);
        $carOwner = CustomerServices::GetCustomerName($request->get('customerId'));

        return json_encode([
            'carBrandName' => $carBrandName,
            'carModelName' => trim(str_replace(["-"],[' '], $carModelName)),
            'carOwner' => $carOwner,
            'customerId' => $request->get('customerId'),
            'carId' => $vehicle[0]['id'],
            'carPlate' => $vehicle[0]["car-plate"],
            'carChassisNumber' => $vehicle[0]["car-chassis-number"]
        ]);

    }

}