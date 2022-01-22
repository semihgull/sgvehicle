<?php

namespace App\Services;

use App\models\Customer;

class CustomerServices
{
    private array $data = [];
    public bool $proccessOk = true;
    public string $errorMessage = '';
    public bool $createOk = false;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function CheckPhone(){
        $customer = Customer::where('customer-phone', '=', $this->data['customer-phone'])->get();
        if (count($customer) > 0){
            $this->proccessOk = false;
            $this->errorMessage = 'Kayıtlı Telefon Numarası';
        }
    }

    public function CheckIdNumber(){
        $customer = Customer::where('customer-id-number', '=', $this->data['customer-id-number'])->get();
        if (count($customer) > 0){
            $this->proccessOk = false;
            $this->errorMessage = 'Kayıtlı TC Kimlik Numarası';
        }
    }

    public function CreateCustomer(){
        $customer = Customer::create([
            'customer-fullname' => $this->data['customer-fullname'],
            'customer-address' => $this->data['customer-address'],
            'customer-phone' => $this->data['customer-phone'],
            'customer-email' => $this->data['customer-email'],
            'customer-id-number' => $this->data['customer-id-number'],
        ]);
        if ($customer){
            $this->createOk = true;
        }
    }

    public function CustomerLastId(){
        $customer = Customer::all();
        return $customer->last()["id"];
    }

    public static function GetCustomerName($customerId)
    {
        $isCustomer = false;
        $error = true;

        is_numeric($customerId) ? $error = false : '';
        if (!$error){
            $customer = Customer::where('id', '=', $customerId)->first();
            return empty($customer) ? '' : $customer['customer-fullname'];
        }
        return false;
    }

}