@extends('../layout')

@section('title', 'Parça Kategori İşlemler')

@section('content')
            @if(@$isCreatedCategory)
                <div class="alert alert-success" role="alert">
                    Kategori Oluşturuldu
                </div>
                <script>userRedirect('{{site_url('store/new-store-category')}}', 1)</script>
                @endif
            @if(@$processOk && @$message)
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
                <script>userRedirect('{{site_url('store/new-store-category')}}', 1)</script>
                @endif

            <div class="page-heading">
                <h3>Parça Kategori İşlemleri</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-info btn-lg btn-block mb-2 new-category-btn" id="new-category-btn">Kategori Ekle</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-info btn-lg btn-block mb-2 edit-category-btn" id="edit-category-btn">Kategori Düzenle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="row new-category-area" id="new-category-area">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('store/new-store-category/create')}}" method="POST">
                                    <div class="form-group">
                                        <label for="category-name">Kategori Adı</label>
                                        <input type="text" name="category-name" id="category-name" class="form-control" @hasError('category-name')>
                                        @getError('category-name')
                                    </div>
                                    <div class="form-group">
                                        <label for="parent-category">Üst Kategori</label>
                                        <select name="parent-category" id="parent-category" class="form-control">
                                            <option value="0">Üst Kategori Yok</option>
                                            {{\App\controllers\StoreController::getCategory()}}
                                        </select>
                                    </div>
                                    <input type="submit" value="Kategori Ekle" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="row edit-category-area" id="edit-category-area">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('store/new-store-category/edit')}}" method="POST">
                                    <div class="form-group">
                                        <label for="parent-category-edit-select">Kategoriler</label>
                                        <select name="parent-category-edit-select" id="parent-category-edit-select" class="form-control">
                                            <option value="0">Kategori Seç</option>
                                            {{\App\controllers\StoreController::getCategory()}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category-name-edit">Kategori Adı</label>
                                        <input type="text" name="category-name-edit" id="category-name-edit" class="form-control" @hasError('category-name-edit')>
                                        <input type="hidden" name="category-id-edit" id="category-id-edit" class="form-control" @hasError('category-id-edit')>
                                        @getError('category-name-edit')
                                    </div>
                                    <div class="form-group">
                                        <label for="parent-category-edit">Üst Kategori</label>
                                        <select name="parent-category-edit" id="parent-category-edit" class="form-control">
                                            <option value="0" id="edit-select-option">Seç</option>
                                            <option value="0">Üst Kategori Yok</option>
                                            <option value="" disabled> --- Kategoriler --- </option>
                                            {{\App\controllers\StoreController::getCategory()}}
                                        </select>
                                    </div>
                                    <input type="submit" value="Kategori Güncelle" class="btn btn-outline-success">
                                    <a href="{{site_url('store/delete-store-category')}}" id="delete-category-btn" data-category-id="">
                                        <input type="btn" value="Sil" class="btn btn-outline-danger">
                                    </a>
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