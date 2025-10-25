<?php 

class BankTransfer implements PaymentGatewayInterface
{
    public function sendPayment(float $amount): string
    {
        return "{$amount} bank transfer done \n";
    }
}