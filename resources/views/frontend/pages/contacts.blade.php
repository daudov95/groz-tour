@extends('frontend.layouts.layout')

@section('content')
    <section class="section details contacts">
        <div class="container">
            <div class="details__wrap">

                <h1 class="page-title">Контакты</h1>

                <div class="details-info">

                    <div class="details-info__row">
                        <span class="details-info__title">Адрес:</span>
                        <span class="details-info__value">109012, г. Москва, ул. Никольская, д. 4, оф. 117</span>
                    </div>
                    <div class="details-info__row">
                        <span class="details-info__title">E-mail:</span>
                        <span class="details-info__value"><a href="mailto:OOOCenterPomoschi@yandex.ru">OOOCenterPomoschi@yandex.ru</a></span>
                    </div>

                </div>

                <div class="contacts-form">
                    <h2 class="contacts-form__title">Обратная связь</h2>
                    <form action="">
                        <input type="text" name="name" placeholder="ФИО" class="contacts-form__input">
                        <input type="text" name="phone" placeholder="Телефон" class="contacts-form__input">
                        <input type="email" name="email" placeholder="E-mail" class="contacts-form__input">
                        <textarea name="question" rows="5" placeholder="Ваш вопрос" class="contacts-form__textarea"></textarea>

                        <button class="contacts-form__btn card-price__btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
