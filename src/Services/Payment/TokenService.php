<?php


namespace RahmatWaisi\PoL\Services\Payment;


use RahmatWaisi\PoL\Exceptions\Payment\TokenException;
use RahmatWaisi\PoL\Services\BaseService;

class TokenService extends BaseService
{


    /**
     *  Gets new payment token from POL payment gateway
     *
     * @param $price
     * @param $paymentId
     * @param string|null $callBack
     * @param string $language
     * @param string|null $nationalCode
     * @param string|null $mobile
     * @param string|null $extraParam32Chars
     * @param string|null $extraParam300Chars
     * @return array|mixed
     * @throws \RahmatWaisi\PoL\Exceptions\PoLException
     */
    public function getToken(
        $price
        , $paymentId
        , string $callBack = null
        , string $language = 'fa'
        , string $nationalCode = null
        , string $mobile = null
        , string $extraParam32Chars = null
        , string $extraParam300Chars = null
    )
    {
        $parameters = [
            'key' => $this->getConfigKey('pol.key'),
            'price' => $price,
            'payLoad' => $extraParam32Chars,
            'buyId' => $paymentId,
            'callBack' => $callBack ?? route($this->getConfigKey('callback_route')),
            'language' => $language,
            'nationalCode' => $nationalCode,
            'mobile' => $mobile,
            'additional' => $extraParam300Chars
        ];

        return $this->response(
            $this->request($parameters)
            , TokenException::class
        );
    }

    /**
     * @inheritDoc
     */
    public function request(array $parameters)
    {
        return $this->client()
            ->post(
                $this->url(),
                [
                    'json' => $parameters
                ]
            );
    }

    /**
     * @inheritDoc
     */
    public function valuesOf($responseResult): array
    {
        return [
            'token' => $responseResult->token
        ];
    }

    /**
     * @inheritDoc
     */
    public function url(): string
    {
        return $this->getConfigKey('pol.apis.token');
    }
}
