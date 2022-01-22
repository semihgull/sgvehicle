@extends('../layout')

@section('title', 'Kullanıcı Listeleme')

@section('content')
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Kullanıcı Ayarları</h3>
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
                                                <a href="{{site_url('user/new-user')}}">
                                                    <button type="button" class="btn btn-outline-success btn-lg btn-block">Yeni Kullanıcı Oluştur</button>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{site_url('user/edit-user')}}">
                                                    <button type="button" class="btn btn-outline-info btn-lg btn-block">Kullanıcı Düzenle</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Kullanıcı Listeleme</h3>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">İsim Soyisim</th>
                                        <th scope="col">Telefon</th>
                                        <th scope="col">E-Posta</th>
                                        <th scope="col">Yetki</th>
                                        <th scope="col">Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user['id']}}</th>
                                        <td>{{$user['first-name']}} {{$user['last-name']}}</td>
                                        <td>{{$user['phone']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['role']}}</td>
                                        <td><a href='{{site_url('user/delete-user/' . $user['id'])}}'><button type="button" class="btn btn-outline-danger">Sil</button></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection