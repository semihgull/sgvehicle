@extends('../layout')

@section('title', 'Yeni Kullanıcı Kayıt')
@section('userScript')
    <script>
      /*  function userRedirect(to, seconds) {
            if (seconds == 0) {
                window.location.href = to;
                return;
            }
            seconds--;
            setTimeout(function() {
                userRedirect(to, seconds);
            }, 1000);
        }*/
    </script>
@endsection
@section('content')
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @if(@$isRegistiration)
                <div class="alert alert-success" role="alert">
                    Kullanıcı Kayıt Edildi
                </div>
                <script>userRedirect('{{site_url('user/settings')}}', 2)</script>
                @endif
            <div class="page-heading">
                <h3>Yeni Kullanıcı Kayıt</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{site_url('user/new-user')}}" method="POST">
                                    <div class="form-group">
                                        <label for="user-first-name">İsim</label>
                                        <input type="text" class="form-control" id="user-first-name" placeholder="Personel Adı" name="user-first-name"
                                               @hasError('user-first-name') value="@getPosts('user-first-name')">
                                        @getError('user-first-name')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-last-name">Soyisim</label>
                                        <input type="text" class="form-control" id="user-last-name" placeholder="Personel Soyadı" name="user-last-name"
                                               @hasError('user-last-name') value="@getPosts('user-last-name')">
                                        @getError('user-last-name')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-name">Kullanıcı adı</label>
                                        <input type="text" class="form-control" id="user-name" placeholder="Personel Kullanıcı Adı" name="user-name"
                                               @hasError('user-name') value="@getPosts('user-name')">
                                        @getError('user-name')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-password">Kullanıcı Şifre</label>
                                        <input type="password" class="form-control" id="user-password" placeholder="Şifre Belirleyin" name="user-password"
                                               @hasError('user-password')>
                                        @getError('user-password')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">Kullanıcı Email</label>
                                        <input type="email" class="form-control" id="user-email" placeholder="E-mail Adresi Girin" name="user-email"
                                               @hasError('user-email') value="@getPosts('user-email')">
                                        @getError('user-email')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-phone">Kullanıcı Telefon</label>
                                        <input type="tel" class="form-control" id="user-phone" placeholder="Telefon Numarası Girin" name="user-phone"
                                               @hasError('user-phone') value="@getPosts('user-phone')">
                                        @getError('user-phone')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-address">Kullanıcı Adress</label>
                                        <textarea class="form-control" id="user-adress" name="user-adress" rows="3" @hasError('user-adress')>@getPosts('user-adress')</textarea>
                                        @getError('user-adress')
                                    </div>
                                    <div class="form-group">
                                        <label for="user-role">Bir Yetki Seçin</label>
                                        <select class="form-control" id="user-role" name="user-role">
                                            <option> --Seçin-- </option>
                                            <option value="6">Sekreter</option>
                                            <option value="7">Usta</option>
                                            <option value="8">Depocu</option>
                                            <option value="9">Yönetici</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kayıt Et</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection