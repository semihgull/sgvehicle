@extends('../layout')

@section('title', 'Yeni Servis Açma')

@section('content')

            <div class="page-heading">
                <h3>Yeni Servis Açma</h3>
            </div>
            @if(@$processOk && @$message)
                <script>
                    Swal.fire('{{$message}}')
                </script>
            @endif
            @if(@$type == 'success')
                <script>userRedirect('{{site_url('orders/new-order')}}', 1)</script>
            @endif

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('orders/new-order')}}" method="POST">
                                    <section id="customer-area">
                                        <h4 class="mt-2">Müşteri Bilgileri</h4>

                                        <div class="input-group">
                                            <input type="text" name="customer-phone-number-search" id="customer-phone-number-search" class="form-control"
                                                   @hasError('customer-phone-number-search') value="@getPosts('customer-fullname')"
                                                aria-label="Telefon Numarası"
                                                aria-describedby="basic-addon2"
                                                placeholder="Telefon Numarası">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="customer-find-btn">Bul</button>
                                            </div>
                                            @getError('customer-phone-number-search')
                                        </div>
                                        <div class="card" id="customer-info-view">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Müşteri Adı</div>
                                                            <div class="card-body text-center" id="customer-fullname">Müşteri Adı</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Müşteri adress</div>
                                                            <div class="card-body text-center" id="customer-address">Müşteri adress</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Müşteri Telefon</div>
                                                            <div class="card-body text-center" id="customer-phone">Müşteri Telefon</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 offset-1">
                                                        <div class="card">
                                                            <div class="card-title text-center">Müşteri E-mail</div>
                                                            <div class="card-body text-center " id="customer-email">Müşteri Email</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Müşteri TC No.</div>
                                                            <div class="card-body text-center" id="customer-id-number">Müşteri TC</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="customer-id-input" id="customer-id-input">
                                            <a id="step-two-btn-next" class="btn btn-outline-primary">Devam Et</a>
                                        </div>
                                    </section>
                                    <section id="vehicles-area">
                                        <h4 class="mt-2">Araç Bilgileri</h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="search-type" id="search-type1" value="chassis-number">
                                                    <label class="form-check-label" for="search-type1">
                                                        Şase No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="search-type" id="search-type2" value="car-plate" checked>
                                                    <label class="form-check-label" for="search-type2">
                                                        Plaka No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" name="car-find-info" id="car-find-info" class="form-control" @hasError('car-find-info') value="@getPosts('car-find-info')">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="car-find-btn">Bul</button>
                                            </div>
                                            @getError('car-find-info')
                                        </div>
                                        <div class="card" id="vehicles-info-view">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Markası</div>
                                                            <div class="card-body text-center" id="car-brand">Araba Markası</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Model</div>
                                                            <div class="card-body text-center" id="car-model">Araba Model</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Şase No</div>
                                                            <div class="card-body text-center" id="car-chassis-number">Müşteri Telefon</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4 offset-3">
                                                        <div class="card">
                                                            <div class="card-title text-center">Plaka</div>
                                                            <div class="card-body text-center" id="car-plate">Plaka</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-title text-center">Araç Sahibi</div>
                                                            <div class="card-body text-center" id="car-owner">Plaka</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="car-id-input">
                                            <a id="step-one-btn" class="btn btn-outline-danger">Geri</a>
                                            <a id="step-tree-btn" class="btn btn-outline-primary">İleri</a>
                                        </div>
                                    </section>
                                    <section id="services-area">
                                        <h4 class="mt-2">Servis Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="car-km">Şuan ki Kilometre</label>
                                            <input type="number" name="car-km" id="car-km" class="form-control" @hasError('car-km') value="@getPosts('car-km')">
                                            @getError('car-km')
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-complaint">Müşteri Şikayeti</label>
                                            <input type="text" name="customer-complaint" id="customer-complaint" class="form-control" @hasError('customer-complaint') value="@getPosts('customer-complaint')">
                                            @getError('customer-complaint')
                                        </div>
                                        <div class="form-group">
                                            <label for="related-master">Usta</label>
                                            <select name="related-master" id="related-master" class="form-control">
                                                <option value="">Seç</option>
                                                {{\App\Services\OrderServices::EmployeeList()}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="order-status">Sipariş Aşaması</label>
                                            <select name="order-status" id="order-status" class="form-control">
                                                <option value="">Seç</option>
                                                {{\App\Services\OrderStatusService::OrderStatusType()}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="masters-opinion">Usta Görüşü</label>
                                            <textarea id="masters-opinion" name="masters-opinion" class="form-control" col="10" row="7" @hasError('masters-opinion')></textarea>
                                            @getError('masters-opinion')
                                        </div>
                                        <a id="step-two-btn-prev" class="btn btn-outline-danger">Geri</a>

                                        <input type="submit" class="btn btn-success" value="Kayıt Aç">
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