<?php


namespace RahmatWaisi\PoL;

use RahmatWaisi\PoL\Services\Payment\ConfirmationService;
use RahmatWaisi\PoL\Services\Payment\PaymentService;
use RahmatWaisi\PoL\Services\Payment\ReversionService;
use RahmatWaisi\PoL\Services\Payment\TokenService;
use RahmatWaisi\PoL\Services\Payment\VerificationService;

class PoLService
{

    /**
     * @var TokenService
     */
    protected $tokenService;

    /**
     * @var VerificationService
     */
    protected $verificationService;

    /**
     * @var ReversionService
     */
    protected $reversionService;

    /**
     * @var ConfirmationService
     */
    protected $confirmationService;

    /**
     * @var PaymentService
     */
    protected $paymentService;


    public function __construct()
    {
        $this->tokenService = new TokenService();
        $this->paymentService = new PaymentService();
        $this->verificationService = new VerificationService();
        $this->reversionService = new ReversionService();
        $this->confirmationService = new ConfirmationService();
    }

    public function pay(string $token, string $paymentId = null)
    {
        return $this->paymentService->pay($token, $paymentId);
    }

    /**
     * @throws Exceptions\PoLException
     */
    public function confirmPayment(string $token, $price, string $payload = null, string $description = null)
    {
        return $this->confirmationService
            ->confirmPayment(
                $token
                , $price
                , $payload
                , $description
            );
    }

    /**
     * @throws Exceptions\PoLException
     */
    public function verifyPayment(string $token, string $price)
    {
        return $this->verificationService->verifyPayment($token, $price);
    }

    /**
     * @throws Exceptions\PoLException
     */
    public function getToken($price, $paymentId, string $callBack, string $language = 'fa', string $nationalCode = null, string $mobile = null, string $extraParam32Chars = null, string $extraParam300Chars = null)
    {
        return $this->tokenService->getToken(
            $price
            , $paymentId
            , $callBack
            , $language
            , $nationalCode
            , $mobile
            , $extraParam32Chars
            , $extraParam300Chars
        );
    }

    /**
     * @throws Exceptions\PoLException
     */
    public function reversePayment(string $token)
    {
        return $this->reversionService->reversePayment($token);
    }
}
