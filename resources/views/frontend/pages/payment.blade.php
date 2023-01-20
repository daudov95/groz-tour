@extends('frontend.layouts.layout')

@section('content')
    <section class="section payment">
        <div class="container">
            <div class="payment__wrap">

                <h1 class="page-title">Описание способов оплаты</h1>

                <div class="payment-info">
                    <p class="payment-info__text">К оплате принимаются платежные карты:</p>
                    <ul class="payment-info__list payment-info__list--nomarker">
                        <li class="payment-info__item">VISA Inc</li>
                        <li class="payment-info__item">MasterCard</li>
                        <li class="payment-info__item">WorldWide</li>
                        <li class="payment-info__item">МИР</li>
                    </ul>
                    <div class="payment-info-icons">
                        <img src="{{ asset('assets/img/icons/visa.png') }}" alt="VISA">
                        <img src="{{ asset('assets/img/icons/mc.png') }}" alt="MasterCard">
                        <img src="{{ asset('assets/img/icons/mir.png') }}" alt="МИР">
                        <img src="{{ asset('assets/img/icons/gpay.png') }}" alt="Google Pay">
                        <img src="{{ asset('assets/img/icons/visa2.png') }}" alt="VISA">
                        <img src="{{ asset('assets/img/icons/mc2.png') }}" alt="MasterCard">
                        <img src="{{ asset('assets/img/icons/mir2.png') }}" alt="МИР">
                    </div>

                    <p class="payment-info__text">Для оплаты товара банковской картой при оформлении заказа в интернет-магазине выберите способ оплаты: банковской картой.</p>
                    <p class="payment-info__text">При оплате заказа банковской картой, обработка платежа происходит на авторизационной странице банка, где Вам необходимо ввести данные Вашей банковской карты: </p>

                    <ul class="payment-info__list">
                        <li class="payment-info__item">Тип карты</li>
                        <li class="payment-info__item">Номер карты</li>
                        <li class="payment-info__item">Срок действия карты (указан на лицевой стороне карты)</li>
                        <li class="payment-info__item">Имя держателя карты (латинскими буквами, точно также как указано на карте)</li>
                        <li class="payment-info__item">CVC2/CVV2 код</li>
                    </ul>
                    <div class="payment-info__img">
                        <img src="{{ asset('assets/img/card-info.png') }}" alt="card">
                    </div>
                    <p class="payment-info__text">Данные Вашей платежной карты гарантировано защищены в соответствии со стандартами безопасности PCI DSS. Данные карты вводятся на защищенной банковской платежной странице, передача информации происходит с применением технологии шифрования SSL. </p>
                    <p class="payment-info__text">Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. Для дополнительной аутентификации Держателя карты используется протокол 3D-Secure для VISA и Mastercard и протокол EMV 3DS (Mir Accept 2.0) для карт МИР.</p>
                    <p class="payment-info__text">Если Эмитент поддерживает данную технологию, Вы будете перенаправлены на его сервер для ввода дополнительных реквизитов платежа. Для протокола EMV 3DS (Mir Accept 2.0) может отсутствовать отдельная страница для ввода дополнительной информации для подтверждения платежа в случае выполнения автоматизированной аутентфикации на стороне эмитента карты.</p>

                    <div class="payment-info-service">

                        <h3 class="payment-info__title">Отказ от услуги</h3>
                        <p class="payment-info__text">Право потребителя на расторжение договора об оказании услуги регламентируется статьей 32 федерального закона «О защите прав потребителей»</p>
                        <ul class="payment-info__list payment-info__list--service">
                            <li class="payment-info__item">Потребитель вправе расторгнуть договор об оказании услуги в любое время, уплатив исполнителю часть цены пропорционально части оказанной услуги до получения извещения о расторжении указанного договора и возместив исполнителю расходы, произведенные им до этого момента в целях исполнения договора, если они не входят в указанную часть цены услуги;</li>
                            <li class="payment-info__item">Потребитель при обнаружении недостатков оказанной услуги вправе по своему выбору потребовать:
                                <ul class="payment-info__list payment-info__list--service">
                                    <li class="payment-info__item">безвозмездного устранения недостатков;</li>
                                    <li class="payment-info__item">соответствующего уменьшения цены;</li>
                                    <li class="payment-info__item">возмещения понесенных им расходов по устранению недостатков своими силами или третьими лицами;</li>
                                </ul>
                            </li>
                            <li class="payment-info__item">Потребитель вправе предъявлять требования, связанные с недостатками оказанной услуги, если они обнаружены в течение гарантийного срока, а при его отсутствии в разумный срок, в пределах двух лет со дня принятия оказанной услуги;</li>
                            <li class="payment-info__item">Исполнитель отвечает за недостатки услуги, на которую не установлен гарантийный срок, если потребитель докажет, что они возникли до ее принятия им или по причинам, возникшим до этого момента;</li>
                        </ul>
                    </div>

                    <div class="payment-info-service">

                        <h3 class="payment-info__title">Описание процедуры заказа услуг</h3>
                        <p class="payment-info__text">Необходимо выбрать нужную экскурсию и на подходящей дате нажать «Забронировать». Заполнить необходимые поля (фио,  телефон, эл.почта), затем ввести реквизиты Пушкинской карты и оплатить. Подтверждение заказа и оплаты будет приходить на указанную электронную почту.</p>
                    </div>
                    <div class="payment-info-service">

                        <h3 class="payment-info__title">Описание способов предоставления услуг</h3>
                        <p class="payment-info__text">Способ предоставления услуг – экскурсии. Регионы – Чеченская республика, Республика Дагестан, Республика Ингушетия.</p>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
