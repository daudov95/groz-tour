<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Mail\OrderExcursion;
use App\Models\Excursion;
use App\Models\ExcursionSchedule;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.payment');
    }

    public function orderInfo($order_id, $session_id)
    {
        $response = $this->orderStatusInfo($order_id, $session_id);
        dd($response);
    }

    public function success(Request $request): View
    {
        if($request->method() == 'GET') {
            return abort(404);
        }


        $xml = base64_decode($request->xmlmsg);
        $response = $this->xmlToJson($xml);

        $order_status = $this->createOrderStatusXml($response->OrderID, $response->SessionID);
        $order_status = $this->xmlToJson($this->responseOrder($order_status))->Response;

        if($order_status->Status === "00" && $order_status->Order->OrderStatus === 'APPROVED') {
            $transaction = Transaction::query()->where('order_id', $response->OrderID)->first();
            $status = $response->OrderStatus == 'APPROVED' ? 'SUCCEEDED' : 'ERROR';

            $transaction->update([
                'description' => $response->ResponseDescription,
                'status' => $status,
                'tran_id' => $response->TranId,
                'tran_time' => $response->TranDateTime,
            ]);

            Mail::to($transaction->email)->send(new OrderExcursion($transaction));

            return view('frontend.pages.payment.success');
        }
       return abort(402);
    }

    public function cancel(Request $request): View
    {
        if($request->method() == 'GET') {
            return abort(404);
        }

        $xml = base64_decode($request->xmlmsg);
        $response = $this->xmlToJson($xml);

        $order_status = $this->createOrderStatusXml($response->OrderID, $response->SessionID);
        $order_status = $this->xmlToJson($this->responseOrder($order_status))->Response;

        if($order_status->Status === "00" && $order_status->Order->OrderStatus === 'CANCELED') {
            $transaction = Transaction::query()->where('order_id', $response->OrderID)->first();
            $status = $response->OrderStatus == 'CANCELED' ? 'CANCELED' : 'ERROR';

            $transaction->update([
                'description' => $response->OrderStatusScr,
                'status' => $status,
                'tran_time' => $response->TranDateTime,
            ]);
            return view('frontend.pages.payment.cancel');
        }

        return abort(402);
    }

    public function error(Request $request): View
    {
        if($request->method() == 'GET') {
            return abort(404);
        }

        $xml = base64_decode($request->xmlmsg);
        $response = $this->xmlToJson($xml);

        $order_status = $this->createOrderStatusXml($response->OrderID, $response->SessionID);
        $order_status = $this->xmlToJson($this->responseOrder($order_status))->Response;

        if($order_status->Status === "00" && $order_status->Order->OrderStatus === 'DECLINED') {
            $transaction = Transaction::query()->where('order_id', $response->OrderID)->first();
            $status = $response->OrderStatus == 'DECLINED' ? 'DECLINED' : 'ERROR';

            $transaction->update([
                'description' => $response->ResponseDescription,
                'status' => $status,
                'tran_id' => $response->TranId,
                'tran_time' => $response->TranDateTime,
            ]);
            return view('frontend.pages.payment.error');
        }

        return abort(402);
    }

    public function payment($id): View
    {
        $schedule = ExcursionSchedule::findOrFail($id);
        return view('frontend.pages.payment.index', compact('schedule'));
    }

    public function paymentStore(StorePaymentRequest $request)
    {
        $excursion_schedule = ExcursionSchedule::find($request->id);
        $excursion = $excursion_schedule->excursion;
        $description = $excursion->title . ' - '. $excursion->id;

        $xml = $this->createOrderXml('CreateOrder', 'Purchase', $excursion_schedule->float_price, $description);
        $response = $this->responseOrder($xml);
        $response = $this->xmlToJson($response)->Response;

        $newTransaction = Transaction::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'price' => $excursion_schedule->price,
            'date' => $excursion_schedule->custom_date,
            'excursion_id' => $request->id,
            'order_id' => $response->Order->OrderID,
            'session_id' => $response->Order->SessionID,
        ]);

        $urlToParams = [
            'ORDERID' => $response->Order->OrderID,
            'SESSIONID' => $response->Order->SessionID,
        ];

        $urlTo = $response->Order->URL.'?'.http_build_query($urlToParams);

        if($response->Status === "00"){
            return redirect()->away($urlTo);
        }
    }

    public function orderStatusInfo($OrderID, $SessionID)
    {

        $order_status = $this->createOrderStatusXml($OrderID, $SessionID);
        $order_status = $this->xmlToJson($this->responseOrder($order_status))->Response;

        return$order_status;
    }

    public function createOrderXml(string $operation = 'CreateOrder', string $order_type = 'Purchase', string $amount, string $description = 'Test'): string
    {
        // идентификатор мерчанта
        $mid = env('MID');

        // исходящее xml_сообщение
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<TKKPG>';
        $xml .= '<Request>';
        $xml .= '<Operation>'.$operation.'</Operation>';
        $xml .= '<Language>RU</Language>';
        $xml .= '<Order>';
        $xml .= '<OrderType>'.$order_type.'</OrderType>';
        $xml .= '<Merchant>'.$mid.'</Merchant>';
        $xml .= '<Amount>'.$amount.'</Amount>';
        $xml .= '<Currency>643</Currency>';
        $xml .= '<Description>'.$description.'</Description>';
        $xml .= '<ApproveURL>'.route('payment.success').'</ApproveURL>';
        $xml .= '<CancelURL>'.route('payment.cancel').'</CancelURL>';
        $xml .= '<DeclineURL>'.route('payment.error').'</DeclineURL>';
        $xml .= '</Order>';
        $xml .= '</Request>';
        $xml .= '</TKKPG>';
        return $xml;
    }

    public function createOrderStatusXml($order_id, $session_id): string
    {
        // идентификатор мерчанта
        $mid = env('MID');

        // исходящее xml_сообщение
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<TKKPG>';
        $xml .= '<Request>';
        $xml .= '<Operation>GetOrderStatus</Operation>';
        $xml .= '<Language>RU</Language>';
        $xml .= '<Order>';
        $xml .= '<Merchant>'.$mid.'</Merchant>';
        $xml .= '<OrderID>'.$order_id.'</OrderID>';
        $xml .= '</Order>';
        $xml .= '<SessionID>'.$session_id.'</SessionID>';
        $xml .= '</Request>';
        $xml .= '</TKKPG>';
        return $xml;
    }

    public function responseOrder($xml): string
    {
        // корневой сертификат банка
        $caFile = storage_path('app/files/payment/'). 'banktestcanew.pem';
        // сертификат торговца
        $certFile = storage_path('app/files/payment/'). '2000214.crt';
        // ключ сертификата
        $keyFile = storage_path('app/files/payment/'). 'user.key';
        // пароль ключа (если есть)
        $privateCertPass = env('PRIVATE_CERT_PASS', null);
        // адрес для отправки запроса
        $serverURI = env('SERVER_URI_PAYMENT', null);

        $ch = curl_init($serverURI);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSLCERT, $certFile);
        curl_setopt($ch, CURLOPT_CAINFO, $caFile);

        curl_setopt($ch, CURLOPT_SSLKEY, $keyFile);
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $privateCertPass);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        // ответ TWPG
        $xmlResponse = curl_exec($ch);

        if(curl_errno($ch) === 0){
            return $xmlResponse;
        }
        return 'ERROR: CHECK PATHS';
    }

    public function xmlToJson($xml)
    {
        $xml = simplexml_load_string($xml);
        $xml = json_encode($xml);
        $xml = json_decode($xml,false);

        return $xml;
    }

}
