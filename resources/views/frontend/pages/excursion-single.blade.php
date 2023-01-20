@extends('frontend.layouts.layout')

@section('custom_styles')
{{--    <link src="{{ asset('') }}">--}}
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
/>
<style>
    .card-price__btn {
        padding: 15px;
    }
</style>
@endsection

@section('content')
    <section class="section single-card">
        <div class="container">
            <div class="single-card__wrap">

                <!-- <h1 class="single-card__title">Tour 1</h1> -->

                <div class="single-card__block">
                    <div class="single-card-img">

                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if(isset($excursion->schedules))
                                    @foreach($excursion->images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/excursion'.$image->link) }}" alt="img">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="single-card-img__pagination">
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                    <h2 class="card-info__title">Описание</h2>
                    <div class="card">
                        <div class="card-info">
                            <h3 class="card-info__title">{{ $excursion->title }}</h3>
                            {!! $excursion->description !!}

                            <ul class="card-info__list">
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Места показа:</span>
                                    <span class="card-info-item__value">{{ $excursion->place }}</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Допустимый возраст:</span>
                                    <span class="card-info-item__value">{{ $excursion->age }}</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Ближайшая дата:</span>
                                    <span class="card-info-item__value">{{ $excursion->nearExcursion }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Продолжительность</h4>
                                <span class="card-price-block__text">{{ $excursion->duration ? $excursion->duration : 2 }} ч.</span>
                            </div>
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Цена за человека</h4>
                                <span class="card-price-block__price">{{ $excursion->format_price }} руб.</span>
                            </div>
                            <a href="#timetable" class="card-price__btn card-price__scroll">Расписание</a>
                        </div>
                    </div>

                    <h2 class="card-info__title">Программа тура</h2>
                    <div class="card-info-program">
                        <div class="card-info-program__list">
                            {!! $excursion->program !!}
                        </div>
                    </div>

                    <h2 class="card-info__title">В стоимость тура включено</h2>
                    <div class="card-info-program">
                        <ul class="card-info-program__list">
                            @foreach(explode(';', $excursion->including) as $include)
                                <li class="card-info-program__item">- {{ $include }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <h2 class="card-info__title" id="timetable">Расписание</h2>

                    <div class="single-card__table">

                        <ul class="single-card__list">
                            @if(isset($schedules))
                                @foreach($schedules as $schedule)
                                    <li class="single-card-item">
                                        <div class="single-card-item__date">
                                            <h4 class="single-card-item__title">Дата</h4>
                                            <span class="single-card-item__value">{{ $schedule->customDate }}</span>
                                        </div>
                                        <div class="single-card-item__price">
                                            <h4 class="single-card-item__title">Цена за человека</h4>
                                            <span class="single-card-item__value">{{ $schedule->format_price }} руб.</span>
                                        </div>
                                        <div class="single-card-item__btn">
                                            <a href="{{ route('payment.index', ['id' => $schedule->id]) }}" class="card-price__btn">Забронировать</a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>


                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection


@section('custom_script')
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2000,
                pauseOnMouseEnter: true
            },
        });
    </script>
@endsection
