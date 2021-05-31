<?php


namespace RahmatWaisi\PoL\Exceptions\Payment;

use RahmatWaisi\PoL\Exceptions\PoLException;

class TokenException extends PoLException
{
    /**
     * @inheritDoc
     */
    protected function getErrors(): array
    {
        return array_merge(
            parent::getErrors()
            , [
                'code-1' => 'فرمت کلید صحیح نیست',
                'code-2' => 'مبلغ وارد شده صحیح نیست',
                'code-3' => 'داده اضافی معتبر نیست',
                'code-4' => 'شناسه پرداخت معتبر نیست',
                'code-5' => 'آدرس برگشت صحیح نیست',
                'code-6' => 'آدرس برگشت معتبر نیست',
                'code-7' => 'کلید معتبر نیست',
                'code-9' => 'نتیجه تراکنش از سمت شاپرک',
                'code-11' => ' کد ملی معتبر نیست',
                'code-12' => 'تلفن همراه معتبر نیست',
                'code-13' => 'داده اضافی بیش از حد مجاز است',
                'code-14' => 'زبان نمایش درگاه معتبر نیست',
                'code-99' => 'تا اطالع ثانوی امکان پرداخت مقدور نمی باشد',
            ]
        );
    }
}
