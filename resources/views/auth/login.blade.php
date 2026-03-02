@extends('theme')
@section('content')

    <h1>Вход</h1>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">Войти</button>
    </form>

@endsection
