@extends('../layout')

@section('title', 'Serviş İşlemleri')

@section('content')

            <div class="page-heading">
                <h3>Tüm Servis Kayıtları</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                   <div class="col-12">
                                       <table class="table table-hover">
                                           <thead>
                                           <tr>
                                               <th scope="col">#Sipariş No</th>
                                               <th scope="col">Plaka</th>
                                               <th scope="col">Yetkili Kişi</th>
                                               <th scope="col">Sipariş Durumu</th>
                                               <th scope="col">Son İşlem Tarihi</th>
                                               <th scope="col">Düzenle</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           @foreach($orders as $order)
                                               <tr>
                                                   <th scope="col">#{{$order['id']}}</th>
                                                   <td>{{\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'plate')}}</td>
                                                   <td>{{\App\Services\UserService::ShowUserName($order['related-master'])}}</td>
                                                   <td>{{\App\Services\OrderStatusService::StatusName($order['order-status'])}}</td>
                                                   <td>{{$order['updated_at']->diffForHumans()}}</td>
                                                   <td><a href="{{site_url('orders/edit-order/'.$order['id'])}}" class="btn btn-primary btn-edit" id="btn-edit" data-service-id="{{$order['id']}}">Düzenle</a></td>
                                               </tr>
                                           @endforeach
                                           </tbody>
                                       </table>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection
@section('js')
    <script type="text/javascript" src="{{assets_url('js/customJs/order.js')}}"></script>
    <script type="text/javascript" src="{{assets_url('js/jquery.inputmask.js')}}"></script>

@endsection