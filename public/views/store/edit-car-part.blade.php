@extends('../layout')

@section('title', 'Parça İşlemleri')

@section('content')
    @if(@$processOk && @$message)
            <script>Swal.fire("{{$message}}")</script>
        <script>userRedirect('{{site_url('store/edit-car-part')}}', 1)</script>
    @endif
            <div class="page-heading">
                <h3>Parça Düzenleme</h3>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('store/car-part-info/get')}}" method="POST">
                                    <div class="form-group">
                                        <label for="parts-list-search">Parça Seç</label>
                                        <select name="parts-list-search" id="parts-list-search" class="form-control">
                                            <option value="">Seç</option>
                                            @foreach($partList as $parts)
                                                <option value="{{$parts["id"]}}">{{$parts["parts-name"]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span>veya</span>
                                    <div class="form-group">
                                        <label for="parts-code-search">Parça Kodu</label>
                                        <input type="text" name="parts-code-search" id="parts-code-search" class="form-control" @hasError('parts-code-search')>
                                        @getError('parts-code-search')
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" id="parts-find-btn">Parça Bul</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('store/edit-car-part/update')}}" method="POST">
                                    <div class="form-group">
                                        <label for="parts-name-edit">Parça Adı</label>
                                        <input type="text" name="parts-name-edit" id="parts-name-edit" class="form-control" @hasError('parts-name-edit')>
                                        <input type="hidden" name="parts-id-edit" id="parts-id-edit" class="form-control">
                                        @getError('parts-name-edit')
                                    </div>

                                    <div class="form-group">
                                        <label for="parts-code-edit">Parça Kodu</label>
                                        <input type="text" name="parts-code-edit" id="parts-code-edit" class="form-control" @hasError('parts-code-edit')>
                                        @getError('parts-code-edit')
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-category-edit">Parça Kategorisi</label>
                                        <select name="parts-category-edit" id="parts-category-edit" class="form-control">
                                            <option value="0" id="edit-select-option">Seç</option>
                                            {{\App\controllers\StoreController::getCategory()}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-stock-edit">Stok Adedi</label>
                                        <input type="number" name="parts-stock-edit" id="parts-stock-edit" class="form-control" @hasError('parts-stock-edit')>
                                        @getError('parts-stock-edit')
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-price-edit">Parça Fiyatı</label>
                                        <input type="number" name="parts-price-edit" id="parts-price-edit" class="form-control" @hasError('parts-price-edit')>
                                        @getError('parts-price-edit')
                                    </div>
                                    <input type="submit" value="Parça Düzenle" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection

@section('js')
    <script src="{{assets_url('js/customJs/store.js')}}"></script>
@endsection