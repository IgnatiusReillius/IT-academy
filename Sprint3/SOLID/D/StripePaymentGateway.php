<?php 

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function sendPayment(float $amount): string
    {
        return "{$amount} payment processed with Stripe \n";
    }
}