<?php

namespace PagarMe\Sdk;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    private $apiKey;
    private $client;
    private $encryptionKey;

    public function __construct(GuzzleClient $client, $apiKey, $encryptionKey)
    {
        $this->client        = $client;
        $this->apiKey        = $apiKey;
        $this->encryptionKey = $encryptionKey;
    }

    public function send(Request $apiRequest)
    {
        $request = $this->client->createRequest(
            $apiRequest->getMethod(),
            $apiRequest->getPath(),
            $this->buildBody($apiRequest)
        );

        try {
            return $this->client->send($request);
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            throw new ClientException($exception);
        }
    }

    private function buildBody(Request $request)
    {
        return [
            'body' => array_merge(
                $request->getPayload(),
                [
                    'api_key'        => $this->apiKey,
                    'encryption_key' => $this->encryptionKey
                ]
            )
        ];
    }
}
