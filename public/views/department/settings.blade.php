@extends('layout')

@section('title', 'Departman Ayarlraı')

@section('content')

    <div class="page-heading">
        <h3>Departman Ayarları</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="h5">Departman Ekle</h5>
                                        <form action="{{site_url('department/settings/save')}}" method="POST">
                                            <div class="form-group">
                                                <label for="department-name">Departman Adı</label>
                                                <input type="text" class="form-control @hasError('department-name')" id="department-name" name="department-name" value="@getPosts('department-name')" placeholder="Departman Adını Girin">
                                                @getError('department-name')
                                            </div>
                                            <input type="submit" class="btn btn-primary me-1 mb-1" value="Ekle">
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="h5">Departman Düzenleme</h5>
                                        <form action="{{site_url('department/settings/edit')}}" method="POST">
                                            <div class="form-group">
                                                <label for="department-name-edit">Departman Adı</label>
                                                <input type="text" class="form-control @hasError('department-name-edit')" id="department-name-edit" onkeyup="changeDepartmentEdit()" name="department-name-edit" value="asdasd" placeholder="Departman Adını Girin">
                                                @getError('department-name-edit')
                                                <input type="hidden" name="department-id-edit" value="" id="department-id-edit">
                                            </div>
                                            <input type="submit" class="btn btn-primary me-1 mb-1" value="Düzenle">
                                            <input type="button" class="btn btn-danger me-1 mb-1" value="Temizle" id="clear-btn">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <section class="section">
                                            <h5 class="h5">Departman Listesi</h5>
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-striped" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Departman Yetki Numarası</th>
                                                            <th>Departman Yetki Adı</th>
                                                            <th>Düzenle</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($departments as $department)
                                                        <tr>
                                                            <td>{{ $department->id }}</td>
                                                            <td>{{ $department->name }}</td>
                                                            <td>
                                                                <button class="btn btn-outline-success" onclick="editFunction({{$department->id}})" >Düzenle</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </section>
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
@section('js')
    <script src="{{assets_url('js/customJs/department.js')}}" type="text/javascript"></script>

@endsection