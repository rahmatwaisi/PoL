<?php


namespace RahmatWaisi\PoL\Exceptions\Payment;


use RahmatWaisi\PoL\Exceptions\PoLException;

class ReversionException extends PoLException
{

    /**
     * @inheritDoc
     */
    protected function getErrors(): array
    {
        return array_merge_recursive(
            parent::getErrors(),
            [
                'code-1' => 'توکن نامعتبر است',
            ]
        );
    }
}
