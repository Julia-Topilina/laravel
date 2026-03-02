@extends('theme')
@section('content')

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="название" value="{{ old('name') }}">
        <input type="number" name="price" placeholder="Цена" value="{{ old('price') }}">
        <textarea name="description" placeholder="Описание">{{ old('description') }}</textarea>
        <input type="submit" value="Сохранить">
        <a href="{{ route('products.index') }}">Отмена</a>
    </form>
@endsection
