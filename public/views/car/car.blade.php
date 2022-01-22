@extends('../layout')

@section('title', 'Araç İşlemleri')

@section('content')

            <div class="page-heading">
                <h3>Araç İşlemleri</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
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
                                    <div class="col-lg-6 col-md-12">
                                        <a href="{{site_url('car/new-car')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Araç Ekle</button>
                                        </a>
                                        <a href="{{site_url('car/edit-car')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Araç Düzenle</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <caption style="caption-side: top">Kayıt Edilen Son 10 Araç</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Plaka</th>
                                        <th scope="col">Araç Sahibi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lastVehicles as $item)
                                    <tr>
                                        <th scope="row">{{$item['id']}}</th>
                                        <td>{{$item['car-plate']}}</td>
                                        <td>{{\App\Services\CustomerServices::GetCustomerName($item['car-owner'])}}</td>
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
