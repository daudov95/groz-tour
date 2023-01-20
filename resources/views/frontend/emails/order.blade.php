<h1>Здравствуйте, {{ $data->name }}.</h1>
<h2>Вы успешно приобрели услугу. Ознакомьтесь с данной информацией</h2>
<p><b>Услуга:</b> <a href="{{ route('single-excursion', ['id'=> $data->excursion_id]) }}">Подробнее</a></p>
<p><b>Цена:</b> {{ $data->price }} руб. </p>
<p><b>Место встречи:</b> вы можете посмотреть на странице <a href="{{ route('single-excursion', ['id'=> $data->excursion_id]) }}" style="color:#155380;">экскурсии</a></p>
