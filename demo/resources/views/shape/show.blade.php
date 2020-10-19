
@extends('layouts.back')
@section('content')
    <div class="container">
        <section class="row">
            <div class="col-5 product_img">
                <img src="{{asset('uploads/' . $shape->img )}}" alt="">
            </div>
            <div class="col-7 product_right">
                <div class="product_text">
                    <h2>Торт {{$shape->name}}</h2>
                    <a href="{{route('shape.image',$shape->id)}}" class="btn_link">Загрузить картинку</a>
                    <p>{{$shape->description}}</p>
                    <p>{{$shape->price}}</p>
                </div>
            </div>
        </section>
    </div>
@endsection