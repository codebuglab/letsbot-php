<?php

namespace LetsBot\Api\Services;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Contracts\ServiceInterface;

/**
 * Base class for all services
 */
abstract class BaseService implements ServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $method;

    /**
     * Create a new service instance
     *
     * @param HttpClientInterface $httpClient
     * @return void
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function send(array $params = null): array
    {
        if (!empty($params) && is_array($params)) {
            $this->params = $params;
        }

        switch ($this->method) {
            case 'get':
                return $this->httpClient->get($this->endpoint, $this->params);
            case 'post':
                return $this->httpClient->post($this->endpoint, $this->params);
            case 'delete':
                return $this->httpClient->delete($this->endpoint, $this->params);
            default:
                return [];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function phone(string $phone): ServiceInterface
    {
        $this->params['phone'] = $phone;
        return $this;
    }

    /**
     * Magic method to handle dynamic method calls
     * 
     * @param string $name
     * @param array $arguments
     * @return $this
     */
    public function __call(string $name, array $arguments)
    {
        if (count($arguments) > 0) {
            $this->params[$name] = $arguments[0];
        }
        
        return $this;
    }
} 