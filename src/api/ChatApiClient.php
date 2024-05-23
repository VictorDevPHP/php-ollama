<?php

namespace api;
require_once __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;

class ChatApiClient
{
    private $baseUrl;
    private $client;
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        $this->client = new Client();
    }
    public function sendMessage(string $model, string $message): string {
        $url = $this->baseUrl . '/api/chat';
        $data = [
            "model" => $model,
            "messages" => [
                [
                    "role" => "user",
                    "content" => $message
                ]
            ],
            "stream" => false
        ];
        $response = $this->client->post($url, 
        [
            'json' => $data
        ]);
        $responseArray = json_decode($response->getBody()->getContents(), true);
        return $responseArray['message']['content'];
    }
}

