<?php


namespace RahmatWaisi\PoL\Exceptions\Payment;


use RahmatWaisi\PoL\Exceptions\PoLException;

class PaymentException extends PoLException
{
    /**
     * @inheritDoc
     */
    protected function getErrors(): array
    {
        return array_merge(
            parent::getErrors()
            , [
                'code-9' => 'نتیجه تراکنش از سمت شاپرک',
            ]
        );
    }
}
