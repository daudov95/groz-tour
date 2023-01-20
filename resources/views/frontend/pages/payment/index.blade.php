@extends('frontend.layouts.layout')

<style>
    .payment__form {
        max-width: 500px;
        width: 100%;
    }

    .payment-order-info {
        /*max-width: 500px;*/
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
        border: 1px solid #ebebeb;
        padding: 15px;
    }
    .payment-order-info h2 {
        line-height: 1.3;
    }

    .payment-order-info__title {
        line-height: 1.3;
        /*margin-bottom: 10px;*/
    }

    /*.payment-order-info span {*/
    /*    margin-bottom: 10px;*/
    /*}*/

    .payment-order-info a {
        display: inline-flex;
        transition: .3s color;
        color: #155380;
        margin-top: 10px;
    }
    .payment-order-info a:hover {
        color: #0e3754;
    }

    .payment-order-info__row {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }
    .payment-order-info__row span {
        margin-right: 5px;
    }

    .payment-order-info-notify {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px dashed #ebebeb;
        width: 100%;
    }

    .payment-order-info-notify span {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .payment-order-info-notify p {
        font-size: 16px;
        color: #8f8f8f;
    }
</style>

@section('content')
    <section class="section about">
        <div class="container">
            <div class="about__wrap">

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif

                <h1 class="page-title">Заполните форму для оформления заказа</h1>

                    <div class="payment-order-info">
                        <h2>Вы выбрали:</h2>
                        <div class="payment-order-info__row">
                            <span>Экскурсия:</span>
                            <h3 class="payment-order-info__title">{{ $schedule->excursion->title }}</h3>
                        </div>
                        <div class="payment-order-info__row">
                            <span>Дата:</span>
                            <h3 class="payment-order-info__title">{{ $schedule->custom_date }}</h3>
                        </div>
                        <div class="payment-order-info__row">
                            <span>Цена:</span>
                            <b>{{ $schedule->format_price }} руб.</b>
                        </div>
                        <a href="{{ route('single-excursion', ['id' => $schedule->excursion->id]) }}">Подробнее</a>

                        <div class="payment-order-info-notify">
                            <span>После ввода контактных данных вас перекинут на страницу оплаты</span>
                            <p>После успешной оплаты вам на почту придет письмо c данными</p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <style>
                            .alert {
                                border: 1px solid #ebebeb;
                                padding: 15px;
                                display: inline-block;
                                margin-bottom: 10px;
                            }
                            .alert li:not(:last-child) {
                                margin-bottom: 5px;
                            }
                        </style>
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0px">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="payment__form">
                        <form action="{{ route('payment.store', ['id' => 1]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $schedule->id }}">

                            <input type="text" name="name" placeholder="ФИО" class="contacts-form__input" required>
                            <input type="text" name="phone" id="phone-mask" placeholder="Телефон" class="contacts-form__input" required>
                            <input type="email" name="email" placeholder="E-mail" class="contacts-form__input" required>
                            <button type="submit" class="contacts-form__btn card-price__btn">Оформить</button>
                        </form>
                    </div>


            </div>
        </div>

    </section>
@endsection

@section('custom_script')
    <script src="{{ asset('assets/js/imask.min.js') }}"></script>
    <script>
        if(document.getElementById('phone-mask')) {
          let phoneMask = IMask(
            document.getElementById('phone-mask'), {
            mask: '+{7}(000) 000-00-00'
          });
        }
    </script>
@endsection
