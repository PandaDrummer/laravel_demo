@extends('layouts.front')
@section('content')
    <section class="my_container row">
        @if($session->has('cart'))
        <div class="col-7">
            <table class="cart_table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Особенности</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                @if( $session->has('cart.customizeCake') )

                        @foreach($session->get('cart.customizeCake') as $id=>$key)
                            <tr>
                        <td>Свой торт</td>
                            <td>
                                Форма:{{$key['nameShape']}}
                                <br>
                                Начинка:{{$key['nameFilling']}}
                                <br>
                                Украшение:{{$key['nameDecoration']}}
                                <br>
                            </td>
                        <td>{{$key['truePrice']}}р</td>
                            </tr>
                        @endforeach

                @endif
                @if($session->has('cart.product'))
                    @foreach($session->get('cart.product') as $id=>$key)
                        <tr>
                        <td>{{$key['nameProduct']}}</td>
                        <td>Нет</td>
                        <td>{{$key['priceProduct']}}р</td>
                        </tr>
                        @endforeach

                @endif
                </tbody>
            </table>
            <button class="btn_clear" onclick="clearCart()">Отчистить</button>
        </div>

        <div class="col-5 ">
            <form action="" class="cart_form">
                <input type="number" value="+7 " placeholder="Номер телефона" >
                <textarea name="" id="" cols="30" rows="10" placeholder="Подробно опишите ваш заказ"></textarea>
                <button type="submit">Заказать</button>
            </form>
        </div>
        @else
        <h2 style="text-align: center">Карзина пуста</h2>
        @endif
    </section>
    <script>
        function clearCart(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: '{{route('clearCart')}}',
                type: 'Post',
                success:function(res){
                    console.log(res);
                }
            }
        );
            setTimeout(function () {
                location.reload();
            }, 200);
        }
    </script>
@endsection
