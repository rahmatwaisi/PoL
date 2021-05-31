<?php


namespace RahmatWaisi\PoL\Http\Controllers;


use Illuminate\Http\Request;
use RahmatWaisi\PoL\Exceptions\Payment\PaymentException;

class PaymentCallbackController
{

    public function __construct()
    {
        // TODO add no middlewares
    }

    /**
     * @throws PaymentException
     */
    function callback(Request $request)
    {
        // Check if gateway response has expected keys;
        if (!$request->has([
            'status',
            'token',
            'referenceNumber',
            'payLoad',
            'errorCode',
            'errorDesc',
        ])) throw new PaymentException(500);

        // response is ok and has all keys that we expect.

        $status = $request->get('status');
        $token = $request->get('token');
        $referenceNumber = $request->get('referenceNumber');
        $payLoad = $request->get('payLoad');
        $errorCode = $request->get('errorCode');
        $errorDesc = $request->get('errorDesc');

        if ($status){

            // TODO store above values in database here
            //  call PoL::confirmPayment(....)

        }else{

            // TODO handle the failed request here
            //  i.e.
            //  1- throw new PaymentException($errorCode);
            //  2- return a proper response with $errorCode and $errorDesc
            //  3- call PoL::reversePayment(....)
            //  anything else

        }
    }
}
