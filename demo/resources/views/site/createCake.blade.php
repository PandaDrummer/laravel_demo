@extends('layouts.front')
@section('content')

    <section class="row my_container">
        <div class="col-5 product_img">
            <img src="{{asset('img/cake.jpg')}}" alt="">
        </div>
        <div class="col-7 product_right">
            <div class="product_text">
                <h2>Создать торт самому </h2>
                <button class="btn_add_cart" onclick="addToCart()" >Заказать</button>
                <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и
                    форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация
                    листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
            </div>

        </div>

    </section>
    <div class="select_menu row my_container">
        <div class="col-3">
            <span class="select_shape"><img class="select_plus" src="{{asset('img/plus.svg')}}" alt=""></span>
            <p id="select_shape_info">Выберите начинку</p>
        </div>
        <div class="col-3">
            <span class="select_filling"><img class="select_plus" src="{{asset('img/plus.svg')}}" alt=""></span>
            <p id="select_filling_info">Выберите начинку  </p>
        </div>
        <div class="col-3">
            <div class="select_kg">
                <input id="select_kg_val" type="number" value="1">
                <div class="select_kg_btn">
                    <button id="btn_up">+</button>
                    <button id="btn_down">-</button>
                </div>
            </div>
            <p>Выберите кол-во кг</p>
        </div>
        <div class="col-3">
            <span class="select_decoration"><img class="select_plus" src="{{asset('img/plus.svg')}}" alt=""></span>
            <p id="select_decoration_info">Выберите украшение </p>
        </div>
    </div>

    <section class="modal_select_shape">
        <button class="modal_select_shape_close"><img src="{{asset('img/close.svg')}}" alt=""></button>
        <div class="modal_select_shape_block row">
            <div class="my_container">
                @foreach($shape as $item)
                <div class="col-6 modal_select_shape_products row" >
                    <div class="col-6"><img src="{{asset('uploads/'. $item->img)}}" alt="" onclick="showShapeImg ( '{{asset('uploads/'. $item->img)}}','{{$item->name}}')"></div>
                    <div class="col-6">
                        <h4>{{$item->name}}</h4>
                        <p>{{$item->description}}</p>
                        <p>Цена формы : {{$item->price}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="modal_select_filling">
        <button class="modal_select_shape_close"><img src="{{asset('img/close.svg')}}" alt=""></button>
        <div class="modal_select_shape_block  ">
            <div class="my_container row">
                @foreach($filling as $item)
                    <div class="col-6">
                <div class="modal_select_filling_product  "  >
                    <img src="{{asset('uploads/'. $item->img)}}" alt="" onclick="showFillingImg('{{asset('uploads/'. $item->img)}}','{{$item->name}}')">
                    <h4>{{$item->name}}</h4>
                    <p>Цена за кг: {{$item->price}}р </p>
                </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="modal_select_decoration">
        <button class="modal_select_shape_close"><img src="{{asset('img/close.svg')}}" alt=""></button>
        <div class="modal_select_shape_block row">
            <div class="my_container">
                @foreach($decoration as $item)
                <div class="modal_select_decoration_product col-6" >
                    <img src="{{asset('uploads/'. $item->img)}}" alt="" onclick="showDecorationImg('{{asset('uploads/'. $item->img)}}','{{$item->name}}')">
                    <h4>{{$item->name}}</h4>
                    <p>Цена: {{$item->price}}р</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        var nameShape= '';
        var nameFilling = '';
        var nameDecoration ='';
        var fillingCount ;

        function showShapeImg(img , name) {
            $(".select_shape").css({
                "background-image": "url( " + img + " )"
            });
            $('#select_shape_info').text("Выбрано : "+name+"");
            $(".select_shape .select_plus").css({
                "display": "none"
            })
            $(".modal_select_shape").css({
                "display": "none"
            });
            nameShape = name;
        }

        function showFillingImg(img , name) {
            $(".select_filling").css({
                "background-image": "url( " + img + " )"
            });
            $('#select_filling_info').text("Выбрано : "+name+"");
            $(".select_filling .select_plus").css({
                "display": "none"
            })
            $(".modal_select_filling").css({
                "display": "none"
            })
            nameFilling = name;
        }
        function showDecorationImg(img , name){
            $(".select_decoration").css({
                "background-image": "url( " + img + " )"
            });
            $('#select_decoration_info').text("Выбрано : "+name+"");
            $(".select_decoration .select_plus").css({
                "display": "none"
            })
            $(".modal_select_decoration").css({
                "display": "none"
            });
            nameDecoration = name;
        }
        function addToCart(){
                fillingCount = $('#select_kg_val').val();

                if(nameShape!='' &&nameFilling!= '' &&nameDecoration!=''){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                            url: '{{route('addCustomizeCake')}}',
                            type: 'Post',
                            data: {nameShape: nameShape , nameFilling:nameFilling , nameDecoration:nameDecoration , fillingCount : fillingCount},
                            success:function(res){
                                console.log(res);
                            }
                        }
                    );
                    $('.btn_add_cart').text('добавлено');
                } else alert('Выбраны не все состовляющие ') ;

        }
    </script>

@endsection
