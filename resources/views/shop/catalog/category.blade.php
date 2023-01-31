
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row text-center'>
        <h1>Каталог товаров</h1>
        <hr>
    </div>

    <div class='row' products-block>
        @foreach ($products as $product)

            @php
                $images = 'product_images/product_no_image.png';
                if ($product->images->first()){
                    $images = $product->images->first()->thumbnail;
                }
            @endphp
            <div class='col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4'>
                <div class="card text-center" style="" href='/'>
                    <a href=""><img src="{{ $images }}" class="card-img-top" alt="..." 
                        style='
                            width: auto;
                            height: 250px;
                            '></a>
                    <div class="card-body">
                    <a href=""><h5 class="card-title">{{ $product->name }}</h5></a>
                    <h3 class="card-text">{{ $product->price }} Р.</h3>
                    <form action="{{ route('cart.store') }}" method="POST"  class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-primary">В корзину</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    <div class="pagination" pagination>
        <div class='row text-center'>
            @if ($products->hasPages())
                {{ $products->links("pagination::bootstrap-4") }}
            @endif
        </div>
    </div>

</div>

@endsection

@section('description', 'Распечатка и оформление будут осуществлены в максимально короткие сроки и с использованием лучших расходников.')
@section('keywords', 'копицентр 24 часа, копировальный центр Москва, копировальный центр круглосуточно, копировальный центр')
@section('title', 'Копицентр Москва, круглосуточный копировальный центр в Москве, Копифаст - 24 часа 7 дней в неделю')



