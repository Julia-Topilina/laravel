@extends('theme')
@section('content')
<h1>Редактировать</h1>
<form action="{{ route('products.update, $products') }}" method="POST">
    @csrf @method('PATCH')
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="number" name="price" value="{{ $product->price }}">
    <input type="text" name="description" value="{{ $product->description }}">
    <textarea name="description" placeholder="Описание">{{ old('description') }}</textarea>

    <input type="submit" value="Обновить" class="btn">
    <a href="{{ route('products.index') }}">Отмена</a>

</form>
@endsection
