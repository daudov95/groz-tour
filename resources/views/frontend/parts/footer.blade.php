<footer class="footer">
    <div class="container">
        <div class="footer__wrap">
            <div class="footer__col">
                <h5 class="footer__title">Меню</h5>
                <ul class="footer__list">
                    <li class="footer__item">
                        <a href="{{ route('index') }}" class="footer__link">Главная</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('about') }}" class="footer__link">О нас</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('events') }}" class="footer__link">Мероприятия организации</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('excursions') }}" class="footer__link">Пушкинская карта</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('legislation') }}" class="footer__link">Законодательство</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('contacts') }}" class="footer__link">Контакты</a>
                    </li>
                    @auth()
                        @if(Auth()->user()->is_admin)
                            <li class="footer__item">
                                <a href="{{ route('admin.index') }}" class="footer__link">Админка</a>
                            </li>
                        @endif
                    @endauth

                </ul>
            </div>
            <div class="footer__col">
                <h5 class="footer__title">Информация</h5>
                <ul class="footer__list">
{{--                    <li class="footer__item">--}}
{{--                        <a href="#" class="footer__link">Политика конфиденциальности</a>--}}
{{--                    </li>--}}
                    <li class="footer__item">
                        <a href="{{ route('details') }}" class="footer__link">Реквизиты</a>
                    </li>
                    <li class="footer__item">
                        <a href="{{ route('payment') }}" class="footer__link">Оплата</a>
                    </li>
{{--                    <li class="footer__item">--}}
{{--                        <a href="#" class="footer__link">Оферта</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="footer__col footer__col--end">
                <h5 class="footer__title">Наши соцсети</h5>
                <div class="footer-social">
                    <a href="#" class="footer-social__link">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M492.044 106.769c-18.482-21.97-52.604-30.931-117.77-30.931H137.721c-66.657 0-101.358 9.54-119.77 32.93C0 131.572 0 165.174 0 211.681v88.64c0 90.097 21.299 135.842 137.721 135.842h236.554c56.512 0 87.826-7.908 108.085-27.296C503.136 388.985 512 356.522 512 300.321v-88.64c0-49.045-1.389-82.845-19.956-104.912zM328.706 268.238l-107.418 56.14a16.504 16.504 0 0 1-7.65 1.878 16.517 16.517 0 0 1-16.516-16.516V197.82a16.516 16.516 0 0 1 24.128-14.657l107.418 55.778a16.515 16.515 0 0 1 .038 29.297z" style="fill:#d7143a"></path></svg>
                    </a>
                    <a href="#" class="footer-social__link">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 551.034 551.034" viewBox="0 0 551.034 551.034"><linearGradient id="a" x1="275.517" x2="275.517" y1="4.571" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#e09b3d"></stop><stop offset=".3" style="stop-color:#c74c4d"></stop><stop offset=".6" style="stop-color:#c21975"></stop><stop offset="1" style="stop-color:#7024c4"></stop></linearGradient><path d="M386.878 0H164.156C73.64 0 0 73.64 0 164.156v222.722c0 90.516 73.64 164.156 164.156 164.156h222.722c90.516 0 164.156-73.64 164.156-164.156V164.156C551.033 73.64 477.393 0 386.878 0zM495.6 386.878c0 60.045-48.677 108.722-108.722 108.722H164.156c-60.045 0-108.722-48.677-108.722-108.722V164.156c0-60.046 48.677-108.722 108.722-108.722h222.722c60.045 0 108.722 48.676 108.722 108.722v222.722z" style="fill:url(#a)"></path><linearGradient id="b" x1="275.517" x2="275.517" y1="4.571" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#e09b3d"></stop><stop offset=".3" style="stop-color:#c74c4d"></stop><stop offset=".6" style="stop-color:#c21975"></stop><stop offset="1" style="stop-color:#7024c4"></stop></linearGradient><path d="M275.517 133C196.933 133 133 196.933 133 275.516s63.933 142.517 142.517 142.517S418.034 354.1 418.034 275.516 354.101 133 275.517 133zm0 229.6c-48.095 0-87.083-38.988-87.083-87.083s38.989-87.083 87.083-87.083c48.095 0 87.083 38.988 87.083 87.083 0 48.094-38.989 87.083-87.083 87.083z" style="fill:url(#b)"></path><linearGradient id="c" x1="418.306" x2="418.306" y1="4.571" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#e09b3d"></stop><stop offset=".3" style="stop-color:#c74c4d"></stop><stop offset=".6" style="stop-color:#c21975"></stop><stop offset="1" style="stop-color:#7024c4"></stop></linearGradient><circle cx="418.306" cy="134.072" r="34.149" style="fill:url(#c)"></circle></svg>
                    </a>
                    <a href="#" class="footer-social__link">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M440.649 295.361c16.984 16.582 34.909 32.182 50.142 50.436 6.729 8.112 13.099 16.482 17.973 25.896 6.906 13.382.651 28.108-11.348 28.907l-74.59-.034c-19.238 1.596-34.585-6.148-47.489-19.302-10.327-10.519-19.891-21.714-29.821-32.588-4.071-4.444-8.332-8.626-13.422-11.932-10.182-6.609-19.021-4.586-24.84 6.034-5.926 10.802-7.271 22.762-7.853 34.8-.799 17.564-6.108 22.182-23.751 22.986-37.705 1.778-73.489-3.926-106.732-22.947-29.308-16.768-52.034-40.441-71.816-67.24-38.513-52.183-68.008-109.525-94.516-168.473-5.967-13.281-1.603-20.41 13.051-20.663 24.333-.473 48.663-.439 73.025-.034 9.89.145 16.437 5.817 20.256 15.16 13.165 32.371 29.274 63.169 49.494 91.716 5.385 7.6 10.876 15.201 18.694 20.55 8.65 5.923 15.236 3.96 19.305-5.676 2.582-6.11 3.713-12.691 4.295-19.234 1.928-22.513 2.182-44.988-1.199-67.422-2.076-14.001-9.962-23.065-23.933-25.714-7.129-1.351-6.068-4.004-2.616-8.073 5.995-7.018 11.634-11.387 22.875-11.387h84.298c13.271 2.619 16.218 8.581 18.035 21.934l.072 93.637c-.145 5.169 2.582 20.51 11.893 23.931 7.452 2.436 12.364-3.526 16.836-8.251 20.183-21.421 34.588-46.737 47.457-72.951 5.711-11.527 10.622-23.497 15.381-35.458 3.526-8.875 9.059-13.242 19.056-13.049l81.132.072c2.406 0 4.84.035 7.17.434 13.671 2.33 17.418 8.211 13.195 21.561-6.653 20.945-19.598 38.4-32.255 55.935-13.53 18.721-28.001 36.802-41.418 55.634-12.328 17.2-11.349 25.868 3.964 40.805z" style="fill:#436eab"></path></svg>
                    </a>
                    <a href="#" class="footer-social__link">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" style="fill:#59aae7"></circle><path d="M256 0c-11.317 0-22.461.744-33.391 2.167C348.216 18.53 445.217 125.933 445.217 256s-97.002 237.47-222.609 253.833A258.556 258.556 0 0 0 256 512c141.385 0 256-114.616 256-256S397.385 0 256 0z" style="fill:#3d9ae3"></path><path d="M164.689 311.141 82.127 269.86c-2.263-1.132-2.285-4.353-.038-5.516L395.75 102.105c2.304-1.192 4.964.811 4.456 3.355l-54.004 270.017a3.094 3.094 0 0 1-4.253 2.237l-73.393-31.453a3.093 3.093 0 0 0-2.721.139l-94.839 52.688c-2.062 1.145-4.597-.345-4.597-2.705v-82.474a3.09 3.09 0 0 0-1.71-2.768z" style="fill:#fcfcfc"></path><path d="m200.31 338.967-.513-82.428a1.504 1.504 0 0 1 .72-1.293l133.899-81.798c1.518-.927 3.106 1.083 1.852 2.345l-101.9 102.624a1.517 1.517 0 0 0-.278.387l-17.43 34.858-13.509 25.988c-.725 1.395-2.831.888-2.841-.683z" style="fill:#d8d7da"></path></svg>
                    </a>
                </div>


            </div>
        </div>
        <div class="footer-bottom">

            <div class="footer-icons">
                <div class="footer-icons__item">
                    <img src="{{ asset('assets/img/icons/visa.png') }}" alt="Visa">
                </div>
                <div class="footer-icons__item">
                    <img src="{{ asset('assets/img/icons/mc.png') }}" alt="MasterCard">
                </div>
                <div class="footer-icons__item">
                    <img src="{{ asset('assets/img/icons/mir.png') }}" alt="Mir">
                </div>
            </div>

            <span class="footer-bottom__copy">© Центр помощи 2022</span>
        </div>
    </div>
</footer>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/custom.js')  }}"></script>

@yield('custom_script')
