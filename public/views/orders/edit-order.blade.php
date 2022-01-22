@extends('../layout')

@section('title', 'Servis Kaydı Düzenleme')

@section('content')

            <div class="page-heading">
                <h3>Servis Kaydı Düzenleme</h3>
            </div>
            @if(@$processOk && @$message)
                <script>
                    Swal.fire('{{$message}}')
                </script>
            @endif
            @if(@$type == 'success')
                <script>userRedirect('{{site_url('orders/list-orders')}}', 1)</script>
            @endif
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('orders/edit-order')}}" method="POST">
                                    <section id="service-area">
                                        <h4 class="mt-2">Servis Bilgileri</h4>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="service-id-edit">Servis Numarası</label>
                                                            <input type="text" class="form-control" id="service-id-edit" name="service-id-edit" disabled value="{{$orders['id']}}">
                                                            <input type="hidden" class="form-control" id="service-id-edit-hidden" name="service-id-edit-hidden" value="{{$orders['id']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="car-km-edit">Araç Kilometresi</label>
                                                            <input type="text" class="form-control" id="car-km-edit" name="car-km-edit" disabled value="{{$orders['car-km']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="customer-complaint-edit">Müşteri Şikayeti</label>
                                                            <textarea class="form-control" id="customer-complaint-edit" name="customer-complaint-edit" disabled>{{$orders['customer-complaint']}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="masters-opinion-edit">Usta Görüşü</label>
                                                            <textarea class="form-control" id="masters-opinion-edit" name="masters-opinion-edit" disabled>{{$orders['masters-opinion']}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="related-master-edit">İlgili Kişi</label>
                                                            <input type="text" class="form-control" id="related-master-edit" name="related-master-edit" disabled value="{{$orders['relatedMaster']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="customer-id-edit">Müşteri Adı</label>
                                                            <input type="text" class="form-control" id="customer-id-edit" name="customer-id-edit" disabled value="{{$orders['customerName']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="car-plate-edit">Plaka</label>
                                                            <input type="text" class="form-control" id="car-plate-edit" name="car-plate-edit" disabled
                                                                   value="{{\App\Services\VehicleInfoServices::ShowCar($orders['car-id'], 'plate')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="chassis-number-edit">Şase Numarası</label>
                                                            <input type="text" class="form-control" id="chassis-number-edit" name="chassis-number-edit" disabled
                                                                   value="{{\App\Services\VehicleInfoServices::ShowCar($orders['car-id'], 'chassis-number')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="order-status-edit">Servis Kayıt Durumu</label>
                                                        <select name="order-status-edit" id="order-status-edit" class="form-control">
                                                            <option value="{{$orders['order-status']}}">{{\App\Services\OrderStatusService::StatusName($orders["order-status"])}}</option>
                                                            {{\App\Services\OrderStatusService::OrderStatusType()}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Güncelle" class="btn btn-success">
                                        </div>
                                    </section>
                                </form>
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