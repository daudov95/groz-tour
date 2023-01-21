@extends('frontend.layouts.layout')

@section('custom_style')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
@endsection

@section('content')
    <section class="section major">

        <div class="major-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://media-cdn.tripadvisor.com/media/photo-m/1280/15/1f/b0/97/caption.jpg" alt="">
                    <div class="major-slider-info">
                        <h2 class="major-slider-info__text">Экскурсии по Чечне</h2>
                        <p>В Чечне много достопримечательностей, <br>удивительных и красивых мест.</p>
                    </div>
                    <div class="major-slider__overlay"></div>
                </div>
                <div class="swiper-slide">
                    <img src="https://tripplanet.ru/wp-content/uploads/europe/russia/grozny/dostoprimechatelnosti-groznogo.jpg" alt="">
                    <div class="major-slider-info">
                        <h2 class="major-slider-info__text">Экскурсии по Чечне</h2>
                        <p>Посетите Грозный.</p>
                    </div>
                    <div class="major-slider__overlay"></div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="container">
            <div class="major__wrap">
                <h1 class="major__title page-title">Направления</h1>

                <div class="major-excursions">
                    <div class="major-excursions-item">
                        <a href="{{ route('excursions') }}"><img src="https://sun9-40.userapi.com/impg/Qi4DlPQ9MkS92W0Jj6-8oXUlhMXenrxf0x_UOg/jvBIZDSmpsI.jpg?size=1080x1080&quality=96&sign=fb01d8bd97092b67d7c54ceaed81ee1a" alt="Img"></a>
                        <h5 class="major-excursions-item__title"><a href="{{ route('excursions') }}">Пушкинская карта</a></h5>
                    </div>
                </div>


                <h3 class="major__title page-title">О компании</h3>
                <div class="major-about">
                    <div class="major-about__left">
                        <p>Туристическая компания «Гроз Тур» — одна из крупнейших компаний на рынке туристических услуг в Республике Чечня. За свое более чем двенадцатилетнее существование туроператор «Гроз Тур» по праву заслужил место лучшей компании Чечни.
                            Качество предлагаемых нами услуг подтверждается многочисленными довольными клиентами со всех краев России. Блестящая репутация компании — результат каждодневного труда штата высококлассных профессионалов своего дела. Сегодня туристическая компания «Гроз Тур» предлагает своим клиентам широкое разнообразие услуг.</p>
                    </div>
                    <div class="major-about__right">
                        <img src="https://s3-eu-central-1.amazonaws.com/news.pr-cy.ru/535312/7582.png" alt="img">
                    </div>

                </div>


                <h4 class="major__title page-title">Экскурсии</h4>
                <div class="major-excursions-list">
                    @if(isset($excursions))
                        @foreach($excursions as $excursion)
                            <div class="major-excursions-list-item">
                                <img src="{{ $excursion->image }}" alt="img">
                                <div class="major-excursions-list-item-info">
                                    <h5 class="major-excursions-list-item-info__title"><a href="{{ route('single-excursion', ['id' => $excursion->id]) }}">{{ $excursion->title }}</a></h5>
                                    <span class="major-excursions-list-item-info__price">{{ $excursion->format_price }} руб.</span>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                <h5 class="major__title page-title">Нужна консультация?</h5>
            </div>
        </div>

    </section>

    <section class="major-form">
        <div class="container">
            <span class="major-form__title">Оставьте контакты, <br> и мы свяжемся с Вами в ближайшее время!</span>
            <div class="major-form__wrap">

                <form action="" method="POST" class="major-form__wrap">
                    <input type="text" name="name" placeholder="Имя" class="major-form__input">
                    <input type="text" name="phone" id="phone-mask" placeholder="Телефон" class="major-form__input">
                    <button class="major-form__btn">Отправить</button>
                </form>
            </div>
            <span class="major-form__accept">Нажимая на кнопку, я соглашаюсь на <a href="#">обработку персональных данных</a></span>
        </div>
    </section>
@endsection

@section('custom_script')
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imask.min.js') }}"></script>
    <script>
        var swiper = new Swiper(".major-slider", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            allowTouchMove: false,
            autoplay: {
                delay: 7000,
            },
        });

        if(document.getElementById('phone-mask')) {
            let phoneMask = IMask(
                document.getElementById('phone-mask'), {
                    mask: '+{7}(000) 000-00-00'
                });
        }
    </script>
@endsection
