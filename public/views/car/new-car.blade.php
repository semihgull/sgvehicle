@extends('../layout')

@section('title', 'Araba Kayıt')

@section('content')

            <div class="page-heading">
                <h3>Araba Kayıt</h3>
            </div>
            @if(@$processOk && @$message)
                <script>
                    Swal.fire('{{$message}}')
                </script>
            @endif
            @if(@$type == 'success')
                <script>userRedirect('{{site_url('car/new-car')}}', 1)</script>
            @endif
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('car/new-car/create')}}" method="POST">
                                    <section id="customer-area">
                                        <h4>Müşteri Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="customer-fullname">Müşteri Adı Soyadı</label>
                                            <input type="text" name="customer-fullname" id="customer-fullname" class="form-control" @hasError('customer-fullname') value="@getPosts('customer-fullname')">
                                            @getError('customer-fullname')
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-address">Müşteri Adres</label>
                                            <textarea name="customer-address" id="customer-address" cols="15" rows="3" @hasError('customer-address') class="form-control">@getPosts('customer-address')</textarea>
                                            @getError('customer-address')
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-phone">Müşteri Telefon</label>
                                            <input type="tel" name="customer-phone" id="customer-phone" class="form-control" @hasError('customer-phone') value="@getPosts('customer-phone')" pattern="[0-9]{3} [0-9]{3} [0-9]{4}">
                                            @getError('customer-phone')
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-email">Müşteri Email</label>
                                            <input type="email" name="customer-email" id="customer-email" class="form-control" @hasError('customer-email') value="@getPosts('customer-email')">
                                            @getError('customer-email')
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-id-number">Müşteri TC No</label>
                                            <input type="number" name="customer-id-number" id="customer-id-number" class="form-control" @hasError('customer-id-number') value="@getPosts('customer-id-number')" pattern="[0-9]{11}">
                                            @getError('customer-id-number')
                                        </div>
                                        <a id="step-two-btn" class="btn btn-outline-primary">Devam Et</a>
                                    </section>
                                    <section id="vehicles-area">
                                        <h4>Araç Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="car-plate">Araba Plakası</label>
                                            <input type="text" name="car-plate" id="car-plate" class="form-control" @hasError('car-plate') value="@getPosts('car-plate')">
                                            @getError('car-plate')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-chassis-number">Araba Şase No</label>
                                            <input type="text" name="car-chassis-number" id="car-chassis-number" class="form-control" @hasError('car-chassis-number') value="@getPosts('car-chassis-number')">
                                            @getError('car-chassis-number')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-brand">Araba Marka</label>
                                            <select name="car-brand" id="car-brand" class="form-control">
                                                <option value="999">Seçin</option>
                                                {{\App\Services\CarServices::ListCarBrand()}}
                                            </select>
                                            @getError('car-brand')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-model">Araba Model</label>
                                            <select name="car-model" id="car-model" class="form-control">
                                                <option value="0">Seçin</option>

                                            </select>
                                            @getError('car-model')
                                        </div>
                                        <a id="step-one-btn" class="btn btn-outline-danger">Geri Gel</a>
                                        <input type="submit" value="Kayıt Et" class="btn btn-outline-success">
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection

@section('js')
    <script type="text/javascript" src="{{assets_url('js/customJs/car.js')}}"></script>
    @endsection