
@extends('layouts.back')
@section('content')
    <div class="container">
        <section class="row">
            <div class="col-5 product_img">
                <img src="{{asset('uploads/' . $decoration->img )}}" alt="">
            </div>
            <div class="col-7 product_right">
                <div class="product_text">
                    <h2>Торт {{$decoration->name}}</h2>
                    <a href="{{route('decoration.image',$decoration->id)}}" class="btn_link">Загрузить картинку</a>
                    <p>{{$decoration->price}}</p>
                </div>
            </div>
        </section>
    </div>
@endsection
