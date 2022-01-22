@extends('../layout')

@section('title', 'Usta Paneli')

@section('content')

    <div class="page-heading">
        <h3>Usta Paneli</h3>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <caption style="caption-side: top">Tamir Aşamasındaki İşler</caption>
                            <thead>
                            <tr>
                                <th scope="col">#Servis Numarası</th>
                                <th scope="col">Plaka</th>
                                <th scope="col">Şase Numarası</th>
                                <th scope="col">Araç Sahibi</th>
                                <th scope="col">Detay Gör</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orders)<1)
                                <tr>
                                    <th scope="row" colspan="5" class="text-center">Tebrikler hiç bekleyen iş yok.</th>
                                </tr>
                            @endif
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">#{{$order['id']}}</th>
                                    <td>{{\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'plate')}}</td>
                                    <td>{{\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'chassis-number')}}</td>
                                    <td>{{\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'owner')}}</td>
                                    <td><a href="{{site_url('master/order/detail/'. $order['id'])}}" class="btn btn-outline-primary">İş Detay</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{assets_url('css/counter-css.css')}}">
@endsection
