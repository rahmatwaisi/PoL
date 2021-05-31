<?php


namespace RahmatWaisi\PoL\Services\Payment;


use Illuminate\Support\Facades\Redirect;

class PaymentService
{
    /**
     * Redirects user to payment page
     *
     * @param string $token
     * @param string|null $paymentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pay(string $token, string $paymentId = null)
    {
        $data = [
            'token' => $token,
        ];

        if (!is_null($paymentId)) {
            $data = array_merge($data, ['buyID' => $paymentId]);
        }

        // redirect user to bank payment page
        return Redirect::away($this->url())->with($data);
    }

    /**
     * Returns the url of pol gateway payment api.
     * @return string
     */
    public function url(): string
    {
        return config('pol.apis.payment');
    }
}
