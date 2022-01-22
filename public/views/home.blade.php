@extends('../layout')

@section('title', 'Ana Sayfa')

@section('content')

            <div class="page-heading">
                <h3>Ana Sayfa</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="counter">
                                            <div class="counter-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <div class="counter-content">
                                                <h3>Toplam Araç Sayısı</h3>
                                                <span class="counter-value">{{\App\Services\VehicleServices::VehicleCounter()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="counter">
                                            <div class="counter-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <div class="counter-content">
                                                <h3>Toplam Ürün Sayısı</h3>
                                                <span class="counter-value">{{\App\Services\StoreService::CountPart()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="card">
                                            <h4 class="card-title">
                                                Son 10 Servis Kaydı
                                            </h4>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#id</th>
                                                        <th scope="col">Plaka</th>
                                                        <th scope="col">Yetkili</th>
                                                        <th scope="col">Durumu</th>
                                                        <th scope="col">Son İşlem Saati</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $item)
                                                        <tr>
                                                            <th scope="row">{{$item['id']}}</th>
                                                            <td>{{\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')}}</td>
                                                            <td>{{\App\Services\UserService::ShowUserName($item['related-master'])}}</td>
                                                            <td>{{\App\Services\OrderStatusService::StatusName($item['order-status'])}}</td>
                                                            <td>{{$item['updated_at']->diffForHumans()}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <div class="card">
                                            <h4 class="card-title">
                                                Son 10 Servisler
                                            </h4>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#id</th>
                                                        <th scope="col">Parça Adı</th>
                                                        <th scope="col">Parça Kodu</th>
                                                        <th scope="col">Sayısı</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($parts as $item)
                                                        <tr>
                                                            <th scope="row">{{$item['id']}}</th>
                                                            <td>{{$item['parts-name']}}</td>
                                                            <td>{{$item['parts-code']}}</td>
                                                            <td>{{$item['parts-quantity']}}</td>
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
                </section>
            </div>

    @endsection


@section('css')
    <link rel="stylesheet" href="{{assets_url('css/counter-css.css')}}">
@endsection
