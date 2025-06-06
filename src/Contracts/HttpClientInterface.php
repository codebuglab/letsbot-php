<?php

namespace LetsBot\Api\Contracts;

/**
 * Interface for HTTP Client operations
 */
interface HttpClientInterface
{
    /**
     * Send a GET request
     *
     * @param string $endpoint
     * @param array $params
     * @return array
     */
    public function get(string $endpoint, array $params = []): array;

    /**
     * Send a POST request
     *
     * @param string $endpoint
     * @param array $params
     * @return array
     */
    public function post(string $endpoint, array $params = []): array;

    /**
     * Send a DELETE request
     *
     * @param string $endpoint
     * @param array $params
     * @return array
     */
    public function delete(string $endpoint, array $params = []): array;

    /**
     * Set API key
     *
     * @param string $apiKey
     * @return self
     */
    public function setApiKey(string $apiKey): self;

    /**
     * Set base domain
     *
     * @param string $domain
     * @return self
     */
    public function setDomain(string $domain): self;

    /**
     * Set SSL verification flag
     *
     * @param bool $verify
     * @return self
     */
    public function setSSLVerify(bool $verify): self;
} 