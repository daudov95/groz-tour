@extends('frontend.layouts.layout')

@section('content')
    <section class="section event">
        <div class="container">
            <div class="event__wrap">

                <h1 class="page-title">Мероприятия организации</h1>

                <div class="event-info">
                    <div class="event-info__img">
                        <img src="https://xn----8sbwczgid3cdd4d.xn--p1ai/wp-content/uploads/2021/03/MIR_RAVNIH-1024x497.jpg" alt="events">
                    </div>

                    <h2 class="event-info__title">Проекты по созданию доступной среды</h2>
                    <!-- <p class="event-info__text">
                        2008-2010 г. – Участие в разработке проекта и создании инфраструктуры доступной для всех нозологий инвалидов «Центра социокультурных программ «ИНТЕГРАЦИЯ» - учреждение Департамента культуры города Москвы, расположенного по адресу: Москва, Лазо, 12 (м. Перово). <a class="event__link" href="http://integratsia.com/studio/s594/">http://integratsia.com/studio/s594/</a>
                    </p>

                    <p class="event-info__text">2012 г. - Разработка проекта и создание инфраструктуры доступной для всех нозологий инвалидов входной группы Федерального фонда обязательного медицинского страхования РФ.</p> -->

                </div>

                <style>
                    .r-title{
                        margin-top: var(--rTitleMarginTop, 0) !important;
                        margin-bottom: var(--rTitleMarginBottom, 0) !important;
                    }


                    p:not([class]){
                        line-height: var(--cssTypographyLineHeight, 1.78);
                        margin-top: var(--cssTypographyBasicMargin, 1em);
                        margin-bottom: 0;
                    }

                    p:not([class]):first-child{
                        margin-top: 0;
                    }

                    /*
                    text component
                    */

                    .text{
                        display: var(--textDisplay, inline-flex);
                        font-size: var(--textFontSize, 1rem);
                    }

                    /*
                    time component
                    */

                    /*
                    core styles
                    */

                    .time{
                        display: var(--timeDisplay, inline-flex);
                    }

                    /*
                    extensions
                    */

                    .time__month{
                        margin-left: var(--timelineMounthMarginLeft, .25em);
                    }

                    /*
                    skin
                    */

                    .time{
                        padding: var(--timePadding, .25rem 1.25rem .25rem);
                        background-color: var(--timeBackgroundColor, #f0f0f0);

                        font-size: var(--timeFontSize, .75rem);
                        font-weight: var(--timeFontWeight, 700);
                        text-transform: var(--timeTextTransform, uppercase);
                        color: var(--timeColor, currentColor);
                    }

                    /*
                    card component
                    */

                    /*
                    core styles
                    */

                    .card{
                        padding: var(--timelineCardPadding, 1.5rem 1.5rem 1.25rem);
                    }

                    .card__content{
                        margin-top: var(--cardContentMarginTop, .5rem);
                    }

                    /*
                    skin
                    */

                    .card{
                        border-radius: var(--timelineCardBorderRadius, 2px);
                        border-left: var(--timelineCardBorderLeftWidth, 3px) solid var(--timelineCardBorderLeftColor, var(--uiTimelineMainColor));
                        box-shadow: var(--timelineCardBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
                        background-color: var(--timelineCardBackgroundColor, #fff);
                    }

                    .timeline .card {
                        overflow: initial;
                    }

                    /*
                    extensions
                    */

                    .card__title{
                        --rTitleMarginTop: var(--cardTitleMarginTop, 1rem);
                        font-size: var(--cardTitleFontSize, 1.25rem);
                    }

                    /*
                    =====
                    CORE STYLES
                    =====
                    */

                    .timeline{
                        display: var(--timelineDisplay, grid);
                        grid-row-gap: var(--timelineGroupsGap, 2rem);
                    }

                    /*
                    1. If timeline__year isn't displaed the gap between it and timeline__cards isn't displayed too
                    */

                    .timeline__year{
                        margin-bottom: 1.25rem; /* 1 */
                    }

                    .timeline__cards{
                        display: var(--timeloneCardsDisplay, grid);
                        grid-row-gap: var(--timeloneCardsGap, 1.5rem);
                    }


                    /*
                    =====
                    SKIN
                    =====
                    */

                    .timeline{
                        --uiTimelineMainColor: var(--timelineMainColor, #222);
                        --uiTimelineSecondaryColor: var(--timelineSecondaryColor, #fff);

                        border-left: var(--timelineLineWidth, 3px) solid var(--timelineLineBackgroundColor, var(--uiTimelineMainColor));
                        padding-top: 1rem;
                        padding-bottom: 1.5rem;
                    }

                    .timeline__year{
                        --timePadding: var(--timelineYearPadding, .5rem 1.5rem);
                        --timeColor: var(--uiTimelineSecondaryColor);
                        --timeBackgroundColor: var(--uiTimelineMainColor);
                        --timeFontWeight: var(--timelineYearFontWeight, 400);
                    }

                    .timeline__card{
                        position: relative;
                        margin-left: var(--timelineCardLineGap, 1rem);
                    }

                    /*
                    1. Stoping cut box shadow
                    */

                    .timeline__cards{
                        overflow: hidden;
                        padding-top: .25rem; /* 1 */
                        padding-bottom: .25rem; /* 1 */
                    }

                    .timeline__card::before{
                        content: "";
                        width: 100%;
                        height: var(--timelineCardLineWidth, 2px);
                        background-color: var(--timelineCardLineBackgroundColor, var(--uiTimelineMainColor));

                        position: absolute;
                        top: var(--timelineCardLineTop, 1rem);
                        left: -50%;
                        z-index: -1;
                    }

                    /*
                    =====
                    SETTINGS
                    =====
                    */
                    /**/
                    .timeline{
                        --timelineMainColor: #4557bb;
                    }
                </style>


                <div class="timeline">
                    <div class="timeline__group">
                        <span class="timeline__year time" aria-hidden="true">2008-2010</span>
                        <div class="timeline__cards">
                            <div class="timeline__card card">
                                <div class="card__content">
                                    <p>Участие в разработке проекта и создании инфраструктуры доступной для всех нозологий инвалидов «Центра социокультурных программ «ИНТЕГРАЦИЯ» - учреждение Департамента культуры города Москвы, расположенного по адресу: Москва, Лазо, 12 (м. Перово). <a class="event__link" href="http://integratsia.com/studio/s594/">http://integratsia.com/studio/s594/</a></p>
                                </div>
                            </div>
                            <div class="timeline__card card">
                                <div class="card__content">
                                    <p>
                                        Участие членов организации в Паралимпийских играх: 1 золотая медаль, 1 серебряная медаль.
                                    </p>
                                </div>
                            </div>


                            <div class="timeline__card card">
                                <div class="card__content">
                                    <p>
                                        «Школа лидерства молодых инвалидов», «Школа общественного и бизнес управления»: программа повышения профессиональной квалификации, социализации, психологической адаптации и трудоустройства молодых людей с ограниченными возможностями здоровья.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="timeline__group">
                        <span class="timeline__year time" aria-hidden="true">2012</span>
                        <div class="timeline__cards">
                            <div class="timeline__card card">

                                <div class="card__content">
                                    <p>Разработка проекта и создание инфраструктуры доступной для всех нозологий инвалидов входной группы Федерального фонда обязательного медицинского страхования РФ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline__group">
                        <span class="timeline__year time" aria-hidden="true">2021</span>
                        <div class="timeline__cards">
                            <div class="timeline__card card">
                                <div class="card__content">
                                    <p>Организация и реализация проекта «Центр социального туризма»</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
