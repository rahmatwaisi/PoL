<?php


namespace RahmatWaisi\PoL\Services\Payment;


use RahmatWaisi\PoL\Exceptions\Payment\VerificationException;
use RahmatWaisi\PoL\Services\BaseService;

class VerificationService extends BaseService
{

    /**
     * Verifies a payment using $token and $price
     *
     * @param string $token
     * @param string $price
     * @return array|mixed
     * @throws \RahmatWaisi\PoL\Exceptions\PoLException
     */
    public function verifyPayment(string $token, string $price)
    {
        $parameters = [
            'price' => $price,
            'token' => $token,
        ];
        return $this->response(
            $this->request($parameters)
            , VerificationException::class
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
        return $this->getConfigKey('pol.apis.verify');
    }
}
