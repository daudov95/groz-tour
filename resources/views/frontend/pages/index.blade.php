@extends('frontend.layouts.layout')

@section('content')
    <section class="section cards">
        <div class="container">
            <div class="cards__wrap">

                <h1 class="cards__title">Все услуги</h1>

                <div class="cards-list">

                    <div class="card">
                        <div class="card-img">
                            <img src="https://chechentour.com/images/jatoms/tours/ekskursiya-na-oz-kezenoj-am-s-audiogidom/729d3c3dc6184d07b0e97a478d52212c.jpeg" alt="img">
                        </div>
                        <div class="card-info">
                            <h3 class="card-info__title">Экскурсия по Грозному</h3>
                            <p class="card-info__desc">Увлекательное знакомство с г. Грозным и его основными достопримечательностями. Мы посетим главные святыни, прогуляемся по цветочному парку,...</p>

                            <ul class="card-info__list">
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Места показа:</span>
                                    <span class="card-info-item__value">Грозный</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Допустимый возраст:</span>
                                    <span class="card-info-item__value">6+</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Ближайшая дата:</span>
                                    <span class="card-info-item__value">30 ноября 2022 в 14:00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Продолжительность</h4>
                                <span class="card-price-block__text">3 часа 30 минут</span>
                            </div>
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Цена за человека от</h4>
                                <span class="card-price-block__price">1000 руб.</span>
                            </div>
                            <a href="single.html" class="card-price__btn">Посмотреть</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-img">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/%D0%9C%D0%B5%D1%87%D0%B5%D1%82%D1%8C_%D0%90%D1%80%D0%B3%D1%83%D0%BD_-_panoramio.jpg" alt="img">
                        </div>
                        <div class="card-info">
                            <h3 class="card-info__title">Экскурсия в Аргунское ущелье до Итум-Кали</h3>
                            <p class="card-info__desc">Увлекательное знакомство с г. Грозным и его основными достопримечательностями. Мы посетим главные святыни, прогуляемся по цветочному парку,...</p>

                            <ul class="card-info__list">
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Места показа:</span>
                                    <span class="card-info-item__value">Аргун</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Допустимый возраст:</span>
                                    <span class="card-info-item__value">14+</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Ближайшая дата:</span>
                                    <span class="card-info-item__value">1 Декабря 2022 в 13:00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Продолжительность</h4>
                                <span class="card-price-block__text">2 часа</span>
                            </div>
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Цена за человека от</h4>
                                <span class="card-price-block__price">5000 руб.</span>
                            </div>
                            <a href="single.html" class="card-price__btn">Посмотреть</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
@endsection
