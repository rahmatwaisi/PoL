<?php
return [

    /**
     * کلید پذیرندگی
     * Acceptance Key
     */

    'key' => '',

    /**
     * callback url to process payment results after redirecting from payment page
     */

    'callback_route' => '/payments/callback',


    /**
     * List of POLCARD.IR APIS
     */

    'apis' => [
        'token' => 'https://ipg.polcard.ir/web/getToken/',
        'payment' => 'https://api.polcard.ir/web/payStart/',
        'confirm' => 'https://ipg.polcard.ir/web/payConfirm/',
        'verify' => 'https://ipg.polcard.ir/web/payVerify/',
        'reverse' => 'https://ipg.polcard.ir/web/payReverse/'
    ],
];
