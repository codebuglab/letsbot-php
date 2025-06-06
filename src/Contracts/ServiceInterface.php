<?php

namespace LetsBot\Api\Contracts;

/**
 * Interface for service operations
 */
interface ServiceInterface
{
    /**
     * Send request with provided parameters
     *
     * @param array|null $params
     * @return array
     */
    public function send(array $params = null): array;
    
    /**
     * Set the phone number
     *
     * @param string $phone
     * @return self
     */
    public function phone(string $phone): self;
} 