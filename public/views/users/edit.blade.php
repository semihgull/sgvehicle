@extends('../layout')

@section('title', 'Kullanıcı Düzenle')
@section('userScript')
    <script>
        function userRedirect(to, seconds) {
            if (seconds == 0) {
                window.location.href = to;
                return;
            }
            seconds--;
            setTimeout(function() {
                userRedirect(to, seconds);
            }, 1000);
        }
    </script>
@endsection
@section('content')
            @if(@$isUpdating)
                <div class="alert alert-success" role="alert">
                    Kullanıcı Güncellendi
                </div>
                <script>userRedirect('{{site_url('user/settings')}}', 2)</script>
                @endif
            <div class="page-heading">
                <h3>Kullanıcı düzenleme</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="user-list">Düzenlenecek Kullanıcılar</label>
                                        <select class="form-control" id="user-list" name="user-list">
                                            <option> --Seçin-- </option>
                                            @foreach($users as $user)
                                                <option value="{{$user['id']}}" data-user-id="{{$user['id']}}">{{$user['name']}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </form>
                                <hr/>
                                <form action="{{site_url('user/edit-user')}}" method="POST">
                                    <div class="form-group">
                                        <label for="user-first-name">İsim</label>
                                        <input type="text" class="form-control" id="user-first-name" placeholder="Personel Adı" name="user-first-name"
                                               @hasError('user-first-name') value="@getPosts('user-first-name')">
                                        @getError('user-first-name')
                                        <input type="hidden" value="" name="user-id" id="user-id">
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
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    @endsection
@section('js')
    <script>
            let userList = document.getElementById('user-list');
            let userId;
            $(userList).on('change', function (){
                userId = $(userList).find(':selected').data("user-id");
                $.ajax({
                    url : 'http://localhost/sgboilerplate/user/get/user-info',
                    type : 'post',
                    data : {"userId" : userId},
                    success: function (response){
                        let user = JSON.parse(response);
                        $("#user-id").val(user["id"]);
                        $("#user-first-name").val(user["first-name"]);
                        $("#user-last-name").val(user["last-name"]);
                        $("#user-name").val(user["name"]);
                        $("#user-email").val(user["email"]);
                        $("#user-phone").val(user["phone"]);
                        $("#user-adress").val(user["adress"]);
                        $('select[id=user-role] option').filter(':selected').val(user["role"])
                        getDepartmentName(user["role"])
                    }
                });
            });

            function getDepartmentName(departmentId){
                $.ajax({
                    url : 'http://localhost/sgboilerplate/department/get/department-info',
                    type : 'post',
                    data : {"departmentId" : departmentId},
                    success: function (response) {
                        let department = JSON.parse(response);
                        $('select[id=user-role] option').filter(':selected').html(department["name"])

                    }
                });

            }

    </script>
    @endsection