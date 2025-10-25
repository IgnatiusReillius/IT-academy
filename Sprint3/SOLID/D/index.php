<?php
require_once "PaymentGatewayInterface.php";
require_once "PaypalPaymentGateway.php";
require_once "BankTransfer.php";
require_once "StripePaymentGateway.php";
require_once "PaymentProcessor.php";

$paypalPayment = new PayPalPaymentGateway();
$bankTransfer = new BankTransfer();
$stripePayment = new StripePaymentGateway();

$paypalPaymentProcessor = new PaymentProcessor($paypalPayment);
echo $paypalPaymentProcessor->procesarPago(1200);

$bankPaymentProcessor = new PaymentProcessor($bankTransfer);
echo $bankPaymentProcessor->procesarPago(750);

$stripePaymentProcessor = new PaymentProcessor($stripePayment);
echo $stripePaymentProcessor->procesarPago(50);