<?php
require "../Classes/Mollie/Payment.php";

class MollieClient
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createPayment()
    {
        return new Payment($this);
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }
}

$mollie = new MollieClient('test_8umVA4dk2r3jUDNU5fQwGPBJrrJQJK');
$payment = $mollie->createPayment();
//
$payment->setAmount(500);
$payment->setRedirectUrl('https://gameplayparty.imlenn.dev/?#');
$payment->setDescription('Reservering nummer #69 - GamePlayParty');
//

$array = json_decode($payment->send(), true);
print_r($array['_links']['checkout']['href']);
