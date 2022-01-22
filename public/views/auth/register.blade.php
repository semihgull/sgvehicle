@extends('layout')

@section('title', 'Register Page')

@section('content')
    <h2>
        Kayıt Ol
    </h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Kullanıcı Adı" class="@hasError('username')" value="@getPosts('username')"><br>
        @getError('username')
        <input type="password" name="password" placeholder="Parola" class="@hasError('password')"><br>
        @getError('password')

        <button type="submit">Kayıt Ol</button>
    </form>
@endsection