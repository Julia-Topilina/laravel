@extends('theme')
@section('content')
    <h1>Все услуги</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                <td>{{ $product->description }}</td>
                <td>{{ number_format($product->price, 2) }} р.</td>
            </tr>
        @endforeach
    </table>
@endsection
