<?php

class Http
{
    protected $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function setUrl($url)
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);

        return $this;
    }

    public function setMethod($method)
    {
        if (!in_array($method, ['GET', 'POST'])) {
            throw new Exception("Method $method not supported, use GET or POST");
        }

        if ($method === 'POST') {
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        }

        return $this;
    }

    public function setPostData($data)
    {
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);

        return $this;
    }

    public function setHeaders($headers)
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        return $this;
    }

    public function execute()
    {
        $response = curl_exec($this->curl);

        curl_close($this->curl);

        return $response;
    }

    public static function get($url)
    {
        return (new self())->setUrl($url);
    }

    public static function post($url, $data)
    {
        return (new self())->setUrl($url)
            ->setMethod('POST')
            ->setPostData($data);
    }
}
