@extends('layouts.front')
@section('content')
    <section class="main_menu row">
        <div class="col-m-5">
            <div class="left_block_1">
                <img src="img/left-1.png" data-aos="fade-up" data-aos-delay="2000" alt="">
                <div class="left_block_text" data-aos="fade-right" data-aos-delay="2000">
                    <h2>Выбрать</h2>
                    <p>готовый торт из списка</p>
                    <a href="{{route('site.product')}}" class="btn_link">перейти</a>
                </div>
            </div>
            <div class="left_block_2">
                <img src="img/left-2.png" data-aos="fade-right" data-aos-delay="2000" alt="">
                <div class="left_block_text_2" data-aos="fade-up" data-aos-delay="2000">
                    <h2>Создать</h2>
                    <p>торт самому из выбранных компонентов</p>
                    <a href="{{route('createCake')}}" class="btn_link">перейти</a>
                </div>
            </div>
        </div>
        <div class="col-m-7">
            <div class="right_block">
                <img src="img/right.png" data-aos="fade-up" data-aos-delay="2000" alt="">
                <div class="right_block_text">
                    <h2>-20%</h2>
                    <p>На свадебные торты</p>
                </div>
            </div>
        </div>
    </section>

@endsection
