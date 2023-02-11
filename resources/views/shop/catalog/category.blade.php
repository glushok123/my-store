
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row text-center'>
        <h1>Каталог товаров</h1>
        <hr>
    </div>

    @include('shop.catalog.product_gird')

    <br>

    @include('shop.catalog.product_pagination')

</div>

@endsection

@section('description', 'Интернет магазин')
@section('keywords', 'Интернет магазин')
@section('title', 'Интернет магазин')



