<?php

interface PaymentGatewayInterface {
    public function sendPayment(float $amount): string;
}