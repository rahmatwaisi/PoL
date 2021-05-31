<?php


namespace RahmatWaisi\PoL\Services\Payment;


use RahmatWaisi\PoL\Exceptions\Payment\ReversionException;
use RahmatWaisi\PoL\Services\BaseService;

class ReversionService extends BaseService
{


    /**
     * Reverses a payment using $token
     *
     * @param string $token
     * @return array|mixed
     * @throws ReversionException|\RahmatWaisi\PoL\Exceptions\PoLException
     */
    public function reversePayment(string $token)
    {
        $parameters = [
            'token' => $token
        ];

        return $this->response(
            $this->request($parameters)
            , ReversionException::class
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
            //   نتیجه اصلاحیه پرداخت
            'status' => $responseResult->status,
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
        return $this->getConfigKey('pol.apis.reverse');
    }
}
