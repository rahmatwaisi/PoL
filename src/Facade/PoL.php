<?php


namespace RahmatWaisi\PoL\Facade;


use Illuminate\Support\Facades\Facade;


/**
 * Class PoL
 * @package RahmatWaisi\PoL
 *
 * @method static getToken($price, $paymentId, string $callBack=null, string $language = 'fa', string $nationalCode = null, string $mobile = null, string $extraParam32Chars = null, string $extraParam300Chars = null)
 * @method static pay(string $token, string $paymentId = null)
 * @method static verifyPayment(string $token, string $price)
 * @method static confirmPayment(string $token, $price, string $payload = null, string $description = null)
 * @method static reversePayment(string $token)
 *
 * @author Rahmat Waisi <rahmatwaisi@gmail.com>
 */
class PoL extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pol';
    }
}
