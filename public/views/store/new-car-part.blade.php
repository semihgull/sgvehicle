@extends('../layout')

@section('title', 'Parça Kayıt')

@section('content')

            <div class="page-heading">
                <h3>Araba Parçası Kayıt</h3>
            </div>
            @if(@$processOk && @$message)
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
                <script>userRedirect('{{site_url('store/new-car-part')}}', 1)</script>
            @endif
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('store/new-car-part/create')}}" method="POST">
                                    <div class="form-group">
                                        <label for="parts-name">Parça Adı</label>
                                        <input type="text" name="parts-name" id="parts-name" class="form-control" @hasError('parts-name')>
                                        @getError('parts-name')
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-code">Parça Kodu</label>
                                        <input type="text" name="parts-code" id="parts-code" class="form-control" @hasError('parts-code')>
                                        @getError('parts-code')
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-category">Parça Kategorisi</label>
                                        <select name="parts-category" id="parts-category" class="form-control">
                                            <option value="0">Seç</option>
                                            {{\App\controllers\StoreController::getCategory()}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-stock">Stok Adedi</label>
                                        <input type="text" name="parts-stock" id="parts-stock" class="form-control" @hasError('parts-stock')>
                                        @getError('parts-stock')
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-price">Parça Fiyatı</label>
                                        <input type="text" name="parts-price" id="parts-price" class="form-control" @hasError('parts-price')>
                                        @getError('parts-price')
                                    </div>
                                    <input type="submit" value="Kayıt Et" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection