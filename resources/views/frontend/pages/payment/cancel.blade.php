@extends('frontend.layouts.layout')
<style>
    .payment-error__link {
        transition: .3s color;
        color: #155380;
    }
    .payment-error__link:hover {
        color: #0e3754;
    }
</style>
@section('content')
    <section class="section about">
        <div class="container">
            <div class="about__wrap">

                <h1 class="page-title">Вы отменили заказ</h1>

                <p class="about-info__text">
                    Вы можете заново оформить в разделе <a href="{{ route('excursions') }}" class="payment-error__link">Пушкинская карта</a>
                </p>
            </div>
        </div>

    </section>
@endsection
