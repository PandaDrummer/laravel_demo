@extends('layouts.front')
@section('content')
    <section class="row my_container">
        <div class="col-5 product_img">
            <img src="{{asset('uploads/'. $product->img)}}" alt="">
        </div>
        <div class="col-7 product_right">
            <div class="product_text">
                <h2>{{$product->name}}</h2>
                <button class="btn_add_cart" onclick="addToCartProduct('{{$product->name}}' , '{{$product->price}}')">Заказать</button>
                <p>{{$product->description}}</p>
            </div>
        </div>
    </section>
    <script>
        function addToCartProduct(name , price){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    url: '{{route('addToCartProduct')}}',
                    type: 'Post',
                    data: { nameProduct: name , priceProduct : price},
                    success:function(res){
                        console.log(res);
                    }
                }
            );
            $('.btn_add_cart').text('добавлено');
        }
    </script>
@endsection
