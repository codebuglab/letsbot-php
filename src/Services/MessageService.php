<?php

namespace LetsBot\Api\Services;

use LetsBot\Api\Contracts\HttpClientInterface;

/**
 * Service for handling messages
 */
class MessageService extends BaseService
{
    /**
     * Create a new text message service
     *
     * @param HttpClientInterface $httpClient
     * @return void
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        parent::__construct($httpClient);
        $this->endpoint = 'message/send';
        $this->method = 'post';
    }

    /**
     * Set message body
     *
     * @param string $body
     * @return $this
     */
    public function body(string $body): self
    {
        $this->params['body'] = $body;
        return $this;
    }
} 