
@extends('layouts.back')
@section('content')
<div class="container">
<section class="row">

    <div class="col-5 product_img">

        <img src="{{asset('uploads/' . $product->img )}}" alt="">
    </div>
    <div class="col-7 product_right">
        <div class="product_text">
            <h2>Торт {{$product->name}}</h2>
            <a href="{{route('product.image',$product->id)}}" class="btn_link">Загрузить картинку</a>
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>
        </div>
    </div>
</section>
</div>
@endsection