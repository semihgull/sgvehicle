@extends('../layout')

@section('title', 'Servis İşlemleri')

@section('content')

            <div class="page-heading">
                <h3>Servis İşlemleri</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <a href="{{site_url('orders/new-order')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Servis Kaydı Aç</button>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <a href="{{site_url('orders/list-orders')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Tüm Servis Kayıtları</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <div class="container mb-4">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Tamamlanan Servisler</h3>
                                    <span class="counter-value">{{\App\Services\OrderServices::CountOrder('complated')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter blue">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Bekleyen Servisler</h3>
                                    <span class="counter-value">{{\App\Services\OrderServices::CountOrder('onhold')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter gray">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Tamir Aşamasında</h3>
                                    <span class="counter-value">{{\App\Services\OrderServices::CountOrder('repair')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter red">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>İptal Servisler</h3>
                                    <span class="counter-value">{{\App\Services\OrderServices::CountOrder('cancel')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <h4 class="card-title">
                                        Tamir Aşamasında Olanlar
                                    </h4>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#id</th>
                                                <th scope="col">Plaka</th>
                                                <th scope="col">Yetkili</th>
                                                <th scope="col">Son İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($repair as $item)
                                                <tr>
                                                    <th scope="row">{{$item['id']}}</th>
                                                    <td>{{\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')}}</td>
                                                    <td>{{\App\Services\UserService::ShowUserName($item['related-master'])}}</td>
                                                    <td>{{$item['updated_at']->diffForHumans()}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <h4 class="card-title">
                                        Son 10 Servisler
                                    </h4>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#id</th>
                                                <th scope="col">Plaka</th>
                                                <th scope="col">Yetkili</th>
                                                <th scope="col">Son İşlem Zamanı</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($onhold as $item)
                                            <tr>
                                                <th scope="row">{{$item['id']}}</th>
                                                <td>{{\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')}}</td>
                                                <td>{{\App\Services\UserService::ShowUserName($item['related-master'])}}</td>
                                                <td>{{$item['updated_at']->diffForHumans()}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
@section('css')
    <link rel="stylesheet" href="{{assets_url('css/counter-css.css')}}">
@endsection
