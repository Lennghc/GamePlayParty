<?php

require 'Http.php';

class Payment
{
    protected $amount;
    protected $currency = "EUR";
    protected $redirectUrl;
    protected $description;
    protected $webhookUrl;
    private $mollie;


    public function __construct($mollie)
    {
        $this->mollie = $mollie;
    }

    public function setAmount($amount)
    {
        $this->amount = [
            'currency' => $this->currency,
            'value' => number_format($amount, 2, '.', ',')
        ];
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setWebhookUrl($webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
    }

    public function send()
    {
        $http = Http::post('https://api.mollie.com/v2/payments', $this->asJson());

        $http->setHeaders([
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->mollie->getApiKey()
        ]);
        $response = $http->execute();

        return $response;
    }

    public function asArray()
    {
        $array =  [
            'amount' => $this->amount,
            'description' => $this->description,
            'redirectUrl' => $this->redirectUrl,
        ];

        if ($this->webhookUrl) {
            $array['webhookUrl'] = $this->webhookUrl;
        }

        return $array;
    }

    public function asJson()
    {
        return json_encode($this->asArray());
    }
}
