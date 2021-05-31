<?php


namespace RahmatWaisi\PoL\Exceptions;

class PoLException extends \Exception
{

    /**
     * Error CODE or ID
     * @var int
     */
    protected $error_code;

    public function __construct($errorId)
    {
        $this->error_code = intval($errorId);
        parent::__construct($this->getErrorMessage($errorId), $errorId);
    }

    /**
     * This method should return array of $code => $message values.
     *
     * @return array - error messages and their code.
     */
    protected function getErrors(): array
    {
        return [
            'code-10' => 'داده ورودی معتبر نیست',
            'code-500' => 'عدم اتصال موفق به درگاه پرداخت'
        ];
    }

    /**
     * Gets message for $errorId
     * @param $errorId
     * @return string error message
     */
    protected function getErrorMessage($errorId): string
    {
        return $this->getErrors()[sprintf('code-%d', $errorId)];
    }
}
