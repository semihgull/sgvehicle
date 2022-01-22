@extends('layout-login')

@section('title', 'Giriş Yap')

@section('content')

    <div class="row h-100">
        <div class="col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{site_url()}}"><img src="{{assets_url('images/logo/logo.png')}}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Giriş Yap.</h1>
                <p class="auth-subtitle">Kullanıcı adı ve şifre kullanarak giriş yapın.</p>
                <form action="" method="POST">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control  @hasError('username')" placeholder="Username" name="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @getError('username')
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block shadow-lg mt-5">Giriş Yap</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="{{site_url()}}">Şifremi Unuttum</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection