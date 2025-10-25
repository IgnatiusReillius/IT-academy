<?php

class PaymentProcessor
{
    protected $payment;

    public function __construct(PaymentGatewayInterface $gateway) {
        $this->payment = $gateway;
    }

    public function procesarPago(float $cantidad): string {
        return $this->payment->sendPayment($cantidad);
    }
}

