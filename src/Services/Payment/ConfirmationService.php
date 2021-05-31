<?php


namespace RahmatWaisi\PoL\Services\Payment;


use RahmatWaisi\PoL\Exceptions\Payment\ConfirmationException;
use RahmatWaisi\PoL\Services\BaseService;

class ConfirmationService extends BaseService
{
    /**
     * Sends a post request to server with information about a payment i.e. $token and $price
     * and if payment was successful it will return a json object that has a status key with
     * true value.
     *
     * Otherwise status will be false and also an errorCode and errorDesc will be presented.
     *
     * @param string $token
     * @param $price
     * @param string|null $payload
     * @param string|null $description
     * @return array|mixed
     * @throws \RahmatWaisi\PoL\Exceptions\PoLException
     */
    public function confirmPayment(
        string $token
        , $price
        , string $payload = null
        , string $description = null
    )
    {

        $parameters = [
            'token' => $token,
            'price' => $price,
            'payLoad' => $payload,
            'description' => $description,
        ];

        return $this->response(
            $this->request($parameters)
            , ConfirmationException::class
        );
    }

    /**
     * @inheritDoc
     */
    public function request(array $parameters)
    {
        return $this->client()
            ->post(
                $this->url()
                , [
                    'form_fields' => $parameters
                ]
            );
    }

    /**
     * @inheritDoc
     */
    public function valuesOf($responseResult): array
    {
        return [
            // نتیجه تایید پرداخت
            'status' => $responseResult->status,
            // مبلغ واریزی
            'amount' => $responseResult->amount,
            // شماره مرجع
            'referenceNumber' => $responseResult->referenceNumber,
            // شماره پیگیری
            'tracingNumber' => $responseResult->tracingNumber,
            // شماره کارت پرداخت کننده
            'cardNumber' => $responseResult->cardNumber,
            // کد ملی پرداخت کننده
            'nationalCode' => $responseResult->nationalCode,
            // شماره موبایل پرداخت کننده
            'mobile' => $responseResult->mobile,
            // زمان انجام تراکنش
            'time' => $responseResult->time,
            // تاریخ انجام تراکنش
            'date' => $responseResult->date,
            // داده اضافی
            'additional' => $responseResult->additional,
            // کد خطا
            'errorCode' => $responseResult->errorCode,
            // توضیح خطا
            'errorDesc' => $responseResult->errorDesc,
        ];
    }

    /**
     * @inheritDoc
     */
    public function url(): string
    {
        return $this->getConfigKey('pol.apis.confirm');
    }
}
