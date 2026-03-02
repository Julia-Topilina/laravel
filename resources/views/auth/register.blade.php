@extends('theme')
@section('content')

    <h1>Регистрация</h1>

    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="имя" value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password_conf" placeholder="подвердите пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>

@endsection
