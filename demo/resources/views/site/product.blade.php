@extends('layouts.front')
@section('content')
    <section class="my_container row">
        @foreach( $product as $item)
        <div class="product_card col-4" data-aos="fade-up">
            <div class="product_card_content">
                <img src="{{asset('uploads/'. $item->img)}}" alt="">
                <strong>{{$item->name}}</strong>
                <p>Цена:{{$item->price}}р</p>
                <a href="{{route('site.view', $item->id)}}">Посмотреть</a>
            </div>
        </div>
        @endforeach
    </section>
@endsection
