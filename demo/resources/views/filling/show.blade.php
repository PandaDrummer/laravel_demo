
@extends('layouts.back')
@section('content')
    <div class="container">
        <section class="row">
            <div class="col-5 product_img">
                <img src="{{asset('uploads/' . $filling->img )}}" alt="">
            </div>
            <div class="col-7 product_right">
                <div class="product_text">
                    <h2>Торт {{$filling->name}}</h2>
                    <a href="{{route('filling.image',$filling->id)}}" class="btn_link">Загрузить картинку</a>
                    <p>{{$filling->description}}</p>
                    <p>{{$filling->price}}</p>
                </div>
            </div>
        </section>
    </div>
@endsection