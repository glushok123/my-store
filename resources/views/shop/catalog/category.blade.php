
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
                $images = 'none';
                if ($product->images->first()){
                    $images = $product->images->first()->thumbnail;
                }
            @endphp
            <div class='col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4'>
                <div class="card text-center" style="" href='/'>
                    <a href=""><img src="{{ $images }}" class="card-img-top" alt="..." style='max-height:250px; width:auto;'></a>
                    <div class="card-body">
                    <a href=""><h5 class="card-title">{{ $product->name }}</h5></a>
                    <h3 class="card-text">{{ $product->price }} Р.</h3>

                    <a href="#" class="btn btn-primary">В корзину</a>
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



