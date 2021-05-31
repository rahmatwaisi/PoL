<?php


namespace RahmatWaisi\PoL\Exceptions\Payment;


use RahmatWaisi\PoL\Exceptions\PoLException;

class ConfirmationException extends PoLException
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
                'code-3' => 'تایید تراکنش از طرف پلکارت انجام نشد',
                'code-4' => 'داده اضافی معتبر نیست',
                'code-5' => 'توضیح تراکنش بیش از حد مجاز است',
                'code-9' => 'نتیجه تراکنش از سمت شاپرک',
            ]
        );
    }
}
