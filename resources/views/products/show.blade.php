@extends ('theme ')
@section(' content')
    <h1>{{ $product->name }}</h1>
    <a href="{{ route('products.index') }}">Назад</a>
    <a href="" class="btn">Назад</а>
        <div class="card">
            <div class="card-body">
                <p><strong>Цена:</strong> {{number_format($product->price, 2) }} ₽</p>
                <p><strong>Описание:</strong> {{ $product->description ?: 'Нет описания' }}</p>

                @if(Auth::user()->isAdmin())
                    <a href="{{ route('$products.edit', $product) }}">Изменить</a>
                @endif
            </div>
        </div>
@endsection
