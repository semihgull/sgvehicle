<?php

namespace App\Controllers;

use App\models\Orders;
use App\Services\CustomerServices;
use App\Services\OrderServices;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Request;

class MasterController extends \Core\Controller
{
    public $OnHoldOrder = [];
    public $RepairOrder = [];
    public $ComplatedOrder = [];
    public $CancelOrder = [];


    public function RunGetOrder()
    {
        $this->OnHoldOrder = Orders::where('order-status', '=', 1)
                            ->where('related-master', '=', auth()->getId())
                            ->get();
        $this->RepairOrder = Orders::where('order-status', '=', 2)
                            ->where('related-master', '=', auth()->getId())
                            ->get();
        $this->ComplatedOrder = Orders::where('order-status', '=', 3)
                            ->where('related-master', '=', auth()->getId())
                            ->get();
        $this->CancelOrder = Orders::where('order-status', '=', 4)
                            ->where('related-master', '=', auth()->getId())
                            ->get();
    }

    /**
     * @return string
     */
    public function OnHoldOrder(){
        $this->RunGetOrder();
        return $this->view('master.on-hold-order', ['orders' => $this->OnHoldOrder]);
    }

    /**
     * @return string
     */
    public function RepairOrder(){
        $this->RunGetOrder();
        return $this->view('master.repair-order', ['orders' => $this->RepairOrder]);
    }

    /**
     * @return string
     */
    public function ComplatedOrder(){
        $this->RunGetOrder();
        return $this->view('master.complated-order', ['orders' => $this->ComplatedOrder]);
    }

    /**
     * @return string
     */
    public function CancelOrder(){
        $this->RunGetOrder();
        return $this->view('master.cancel-order', ['orders' => $this->CancelOrder]);
    }

    public function DetailMaster($orderId){
        $OrderCheck = OrderServices::OrderCheck($orderId);
        empty($OrderCheck) ? redirect()->send() : '';

        return $this->view('master.detail-order', ['orders' => $OrderCheck]);
    }

    public function DetailUpdate(Request $request){
        $orders = $this->GetOrders($request->get('service-id-edit-hidden'));
        $this->validator->rule('required', ['service-id-edit-hidden', 'order-status-edit']);
        if ($this->validator->validate()){
            $isOrder = OrderServices::OrderCheck($request->get('service-id-edit-hidden'));
            if (!empty($isOrder)){

                OrderServices::OrderUpdate($request->get('service-id-edit-hidden'), $request->get('order-status-edit'));
                redirect(site_url('master/order/detail/' . $request->get('service-id-edit-hidden')))
                        ->with("Güncelleme Başarılı")
                    ->send();
                /*return $this->view('master.on-hold-order', [
                    'orders' => $this->OnHoldOrder,
                    'processOk' => 1,
                    'message' => "Kayıt Güncellendi",
                    'type' => 'success'
                ]);*/
            }
        }
    }

    /**
     * @param numeric $id
     */
    private function GetOrders($id){

        $orders = OrderServices::OrderCheck($id);
        $customerName = CustomerServices::GetCustomerName($orders['customer-id']);
        $relatedMaster = UserService::ShowUserName($orders['related-master']);
        $orders->customerName = $customerName;
        $orders->relatedMaster = $relatedMaster;

        return $orders;
    }
}