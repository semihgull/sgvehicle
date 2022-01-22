@extends('../layout')

@section('title', 'Araba Düzenleme')

@section('content')

            <div class="page-heading">
                <h3>Araba Düzenleme</h3>
            </div>
            @if(@$processOk && @$message)
                <script>
                    Swal.fire('{{$message}}')
                </script>
            @endif
            @if(@$type == 'success')
                <script>userRedirect('{{site_url('car/edit-car')}}', 1)</script>
            @endif
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="car-search-info">Araç Bilgisi</label>
                                    <input type="text" class="form-control" id="car-search-info" placeholder="Plaka veya Şase Numarası Girin">
                                    <div class="alert alert-primary" role="alert" id="length-info">
                                        En Az Üç Karakter Girmelisiniz.
                                    </div>
                                    <div class="alert alert-danger" role="alert" id="error-info">
                                        Kayıtlı Araç Bulunamadı.
                                    </div>
                                </div>

                                <form action="{{site_url('car/edit-car/continue')}}" method="POST">
                                    <section id="edit-area">
                                        <h4>Araç Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="car-plate-edit">Araba Plakası</label>
                                            <input type="text" name="car-plate-edit" id="car-plate-edit" class="form-control" @hasError('car-plate-edit') value="@getPosts('car-plate-edit')">
                                            <input type="hidden" name="car-id-edit" id="car-id-edit" class="form-control">
                                            @getError('car-plate-edit')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-chassis-number-edit">Araba Şase No</label>
                                            <input type="text" name="car-chassis-number-edit" id="car-chassis-number-edit" class="form-control" @hasError('car-chassis-number-edit') value="@getPosts('car-chassis-number-edit')">
                                            @getError('car-chassis-number-edit')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-brand-edit">Araba Marka</label>
                                            <select name="car-brand-edit" id="car-brand-edit" class="form-control">
                                                <option value="999" id="car-brand-selected">Seçin</option>
                                                {{\App\Services\CarServices::ListCarBrand()}}
                                            </select>
                                            @getError('car-brand-edit')
                                        </div>
                                        <div class="form-group">
                                            <label for="car-model-edit">Araba Model</label>
                                            <select name="car-model-edit" id="car-model-edit" class="form-control">
                                                <option value="0" id="car-model-selected">Seçin</option>
                                            </select>
                                            @getError('car-model-edit')
                                        </div>
                                        <input type="submit" value="Güncelle" class="btn btn-outline-success">
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