<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{assets_url ('css/main.css')}}">
    <link rel="stylesheet" href="{{assets_url ('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{assets_url ('vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{assets_url ('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{assets_url ('vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{assets_url ('css/app.css')}}">
    <script src="{{assets_url ('js/customJs/helper.js')}}"></script>
    <link rel="shortcut icon" href="{{assets_url('images/favicon.svg')}}" type="image/x-icon">

    @yield('css')
    <title>@yield('title')</title>
    <script>
        setTimeout(() => document.querySelector('.msg').style.display = 'none', 1500);
    </script>
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
    @yield('userScript')
</head>
<body>
@getError('error')
@if($msg = msg('msg'))
    <div class="msg">
        {!! $msg !!}
    </div>
    @endif
<main>
    <div id="app">
        @include('menu')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<script src="{{assets_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{assets_url('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{assets_url('vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{assets_url('js/pages/dashboard.js')}}"></script>
<script src="{{assets_url('js/mazer.js')}}"></script>

@yield('js')

</body>
</html>