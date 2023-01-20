@extends('frontend.layouts.layout')
<style>
    .card-price {
        min-width: 266px;
        width: 266px;
    }
    .card-img {
        width: 350px;
        height: 100%;
    }

    .pagination {
        display: flex;
    }
    .page-item {
        margin-right: 10px;
    }

    .cards-list {
        margin-bottom: 30px;
    }

    .page-item.active {
        color: #00f;
    }

</style>
@section('content')
    <section class="section cards">
        <div class="container">
            <div class="cards__wrap">

                <h1 class="cards__title">Все услуги</h1>

                <div class="cards-list">


                    @foreach($excursions as $excursion)
                        <div class="card">
                            <div class="card-img">
{{--                                @d($excursion->images);--}}
                                <img src="{{ $excursion->image }}" alt="img">
                            </div>
                            <div class="card-info">
                                <h3 class="card-info__title">{{ $excursion->title }}</h3>
                                <p class="card-info__desc">{{ $excursion->excerpt }}</p>

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
                                <a href="{{ route('single-excursion', ['id' => $excursion->id]) }}" class="card-price__btn">Посмотреть</a>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $excursions->links() }}

            </div>
        </div>

    </section>
@endsection
