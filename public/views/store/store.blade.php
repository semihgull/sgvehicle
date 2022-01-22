@extends('../layout')

@section('title', 'Parça İşlemleri')

@section('content')
            <div class="page-heading">
                <h3>Parça İşlemleri</h3>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="counter">
                                                <div class="counter-icon">
                                                    <i class="fa fa-globe"></i>
                                                </div>
                                                <div class="counter-content">
                                                    <h3>Toplam Kategori Sayısı</h3>
                                                    <span class="counter-value">{{\App\Services\StoreService::CountCatgory()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{site_url('store/new-store-category')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Parça Kategorisi Ekle</button>
                                        </a>
                                        <a href="{{site_url('store/new-car-part')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Parça Ekle</button>
                                        </a>
                                        <a href="{{site_url('store/edit-car-part')}}">
                                            <button type="button" class="btn btn-info btn-lg btn-block mt-2">Parça Düzenle</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <caption style="caption-side: top;">Stoğu 10'dan Eksik Olan Ürünler</caption>
                                        <thead>
                                        <tr>
                                            <th scope="row">Ürün No</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Kalan Ürün</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($parts as $part)
                                        <tr>
                                            <th scope="row">{{$part['id']}}</th>
                                            <td>{{$part['parts-name']}}</td>
                                            <td>{{$part['parts-code']}}</td>
                                            <td>{{$part['parts-quantity']}}</td>
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

    @endsection

@section('css')
    <link rel="stylesheet" href="{{assets_url('css/counter-css.css')}}">
@endsection
