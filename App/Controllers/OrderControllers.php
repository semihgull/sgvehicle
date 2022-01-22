<?php


namespace App\Controllers;


use App\models\Orders;
use App\Models\User;
use App\Services\CustomerServices;
use App\Services\OrderServices;
use App\Services\UserService;
use Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use function Symfony\Component\Translation\t;

class OrderControllers extends Controller {

    /**
     * @return string
     */
    public function main(): string
    {
        $repair = Orders::where('order-status', '=', 2)->take(10)->get();
        $onhold = Orders::where('order-status', '=', 1)->take(10)->get();

        return $this->view('orders.order', ['repair' => $repair, 'onhold' => $onhold]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function NewOrder(Request $request){
        $isError = true;
        if ($request->isMethod("POST")){
            $this->validator->rule('required', [
                'car-km',
                'customer-complaint',
                'related-master',
                'masters-opinion',
                'customer-id-input',
                'car-id-input'
            ]);

            if ($this->validator->validate()){
                $order = OrderServices::CreateOrder($request);

                if ($order){
                    return $this->view('orders.new-order', ['processOk' => 1, 'message' => 'Servis Kaydı Açıldı', 'type' => 'success']);
                }else{
                    return $this->view('orders.new-order', ['processOk' => 1, 'message' => 'Servis Kaydı Açılamadı', 'type' => 'error']);
                }
            }
        }

        return $this->view('orders.new-order');

    }

    /**
     * @param $id
     * @return string
     */
    public function EditOrder($id)
    {
        /*
         * İd kontrol edilecek varsa veriler istenip işlenecek yoksa hata verilip geri gidilecek
         * */
        $orders = $this->GetOrders($id);

        return $this->view('orders.edit-order', ['orders' => $orders]);
    }

    /**
     * @return string
     */
    public function OrderList(){
        $orders = Orders::orderBy('id', 'desc')->get();

        return $this->view('orders.order-list', ['orders' => $orders]);
    }

    /**
     * @param Request $request
     */
    public function EditOrderUpdate(Request $request){
        $orders = $this->GetOrders($request->get('service-id-edit-hidden'));
        $this->validator->rule('required', ['service-id-edit-hidden', 'order-status-edit']);
        if ($this->validator->validate()){
            $isOrder = OrderServices::OrderCheck($request->get('service-id-edit-hidden'));
            if (!empty($isOrder)){
                OrderServices::OrderUpdate($request->get('service-id-edit-hidden'), $request->get('order-status-edit'));
                return $this->view('orders.edit-order', [
                    'orders' => $orders,
                    'processOk' => 1,
                    'message' => "Kayıt Güncellendi",
                    'type' => 'success'
                ]);
            }
        }
        //return redirect()->send();
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