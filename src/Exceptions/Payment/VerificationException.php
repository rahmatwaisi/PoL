<?php


namespace RahmatWaisi\PoL\Exceptions\Payment;


use RahmatWaisi\PoL\Exceptions\PoLException;

class VerificationException extends PoLException
{

    /**
     * @inheritDoc
     */
    protected function getErrors(): array
    {
        return array_merge(
            parent::getErrors()
            , [
                'code-1' => 'توکن نامعتبر است',
                'code-2' => 'تراکنش نامعتبر است',
            ]
        );
    }
}
