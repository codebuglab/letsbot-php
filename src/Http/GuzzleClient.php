<?php

namespace LetsBot\Api\Http;

use GuzzleHttp\Client;
use LetsBot\Api\Contracts\HttpClientInterface;

/**
 * HTTP Client implementation using Guzzle
 */
class GuzzleClient implements HttpClientInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var bool
     */
    private $sslVerify = true;

    /**
     * @var string
     */
    private $apiVersion = '/api/v1/';

    /**
     * Create a new Guzzle HTTP client
     * 
     * @return Client
     */
    private function client(): Client
    {
        return new Client(['base_uri' => $this->domain]);
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $endpoint, array $params = []): array
    {
        $client = $this->client()->request('GET', $this->apiVersion . $endpoint, [
            'query' => http_build_query($params),
            'verify' => $this->sslVerify,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return json_decode($client->getBody()->getContents(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function post(string $endpoint, array $params = []): array
    {
        $client = $this->client()->request('POST', $this->apiVersion . $endpoint, [
            'json' => $params,
            'verify' => $this->sslVerify,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return json_decode($client->getBody()->getContents(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(string $endpoint, array $params = []): array
    {
        $client = $this->client()->request('DELETE', $this->apiVersion . $endpoint, [
            'json' => $params,
            'verify' => $this->sslVerify,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return json_decode($client->getBody()->getContents(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function setApiKey(string $apiKey): HttpClientInterface
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setDomain(string $domain): HttpClientInterface
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSSLVerify(bool $verify): HttpClientInterface
    {
        $this->sslVerify = $verify;
        return $this;
    }
} 