<?php

namespace App\Services\Paykeeper;

class PaykeeperService
{
    public function index()
    {
        return dd('test');
    }

    public function createOrder(int $amount, string $name, string $order_id, string $email, string $service_name, string $phone): array
    {
        # Параметры платежа, сумма - обязательный параметр
        # Остальные параметры можно не задавать
        $payment_data = array (
            "pay_amount" => $amount,
            "clientid" => $name,
            "orderid" => $order_id,
            "client_email" => $email,
            "service_name" => $service_name,
            "client_phone" => $phone
        );

        return $payment_data;
    }

    public function getToken(string $server_paykeeper, array $headers): array
    {
        # Готовим первый запрос на получение токена безопасности
        $uri="/info/settings/token/";

        # Для сетевых запросов в этом примере используется cURL
        $curl=curl_init();

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_URL,$server_paykeeper.$uri);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($curl,CURLOPT_HEADER,false);

        # Инициируем запрос к API
        $response=curl_exec($curl);
        $token_array = json_decode($response,true);

        # В ответе должно быть заполнено поле token, иначе - ошибка
        if (isset($token_array['token'])) {
            $token = $token_array['token'];
        } else die('Не удалось получить токен');

        return $token_array;
    }

    public function getHeaders(string $user, string $password): array
    {
        # Basic-авторизация передаётся как base64
        $base64=base64_encode("$user:$password");
        $headers=Array();
        array_push($headers,'Content-Type: application/x-www-form-urlencoded');

        # Подготавливаем заголовок для авторизации
        array_push($headers,'Authorization: Basic '.$base64);

        return $headers;
    }

    public function getInvoice(array $payment_data, string $token, string $server_paykeeper, array $headers): array
    {
        # Готовим запрос 3.4 JSON API на получение счёта
        $uri="/change/invoice/preview/";

        # Формируем список POST параметров
        $request = http_build_query(array_merge($payment_data, array ('token'=>$token)));

        $curl=curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_URL,$server_paykeeper.$uri);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$request);


        $response=json_decode(curl_exec($curl),true);

        # В ответе должно быть поле invoice_id, иначе - ошибка
        if (isset($response['invoice_id'])) $invoice_id = $response['invoice_id']; else die();

        # В этой переменной прямая ссылка на оплату с заданными параметрами
        $link = "https://$server_paykeeper/bill/$invoice_id/";
        return $response;
    }

    public function getOrder()
    {
        # Логин и пароль от личного кабинета PayKeeper и адрес адрес сервера
        $user = env('PAYMENT_USER');
        $password = env('PAYMENT_PASSWORD');
        $server_paykeeper = env('SERVER_URL_PAYMENT');

        # Подготавливаем заголовок для авторизации
        $headers = $this->getHeaders($user, $password);

        # Параметры платежа, сумма - обязательный параметр
        $payment_data = $this->createOrder(50, 'Magomed Daudov', 'order #55513145', 'daudov95@mail.ru', 'buy a ticket excursion', '+7(880) 555-35-35');

        # Получение токена
        $token_response= $this->getToken($server_paykeeper, $headers);
        $token = $token_response['token'];

        # Получаем массив с данными
        $response = $this->getInvoice($payment_data, $token, $server_paykeeper, $headers);


        # В этой переменной прямая ссылка на оплату с заданными параметрами
//        $link = "https://$server_paykeeper/bill/".$response['invoice_id']."/";
        $link = $response['invoice_url'];

        # Теперь её можно использовать как угодно, например, выводим ссылку на оплату
        return $response;
    }
}
