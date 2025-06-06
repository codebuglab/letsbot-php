<?php

namespace LetsBot\Api\Services;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Contracts\ServiceInterface;

/**
 * Group Service
 */
class GroupService implements ServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $operation;

    /**
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Create a new group service
     *
     * @param HttpClientInterface $client
     * @param string $operation
     */
    public function __construct(HttpClientInterface $client, string $operation = 'group')
    {
        $this->client = $client;
        $this->operation = $operation;
    }

    /**
     * Set the phone number
     *
     * @param string $phone
     * @return self
     */
    public function phone(string $phone): self
    {
        $this->phoneNumber = $phone;
        return $this;
    }

    /**
     * Send request with provided parameters
     *
     * @param array|null $params
     * @return array
     */
    public function send(array $params = null): array
    {
        $data = $params ?? [];
        
        if ($this->phoneNumber && !isset($data['phone'])) {
            $data['phone'] = $this->phoneNumber;
        }
        
        return $this->client->post($this->getEndpoint(), $data);
    }
    
    /**
     * Get the list of groups
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function list(HttpClientInterface $client): self
    {
        return new static($client, 'group/list');
    }
    
    /**
     * Create a new group
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function create(HttpClientInterface $client): self
    {
        return new static($client, 'group/create');
    }
    
    /**
     * Join a group using invite code
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function join(HttpClientInterface $client): self
    {
        return new static($client, 'group/join');
    }
    
    /**
     * Generate invite code for a group
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function generateInvite(HttpClientInterface $client): self
    {
        return new static($client, 'group/invite');
    }
    
    /**
     * Create group with name
     * 
     * @param string $name Group name
     * @return array
     */
    public function createGroup(string $name): array
    {
        return $this->send(['name' => $name]);
    }
    
    /**
     * Get all groups
     * 
     * @return array
     */
    public function getGroups(): array
    {
        return $this->send();
    }
    
    /**
     * Join group with invite code
     * 
     * @param string $inviteCode
     * @return array
     */
    public function joinGroup(string $inviteCode): array
    {
        return $this->send(['code' => $inviteCode]);
    }
    
    /**
     * Generate invite code for a group
     * 
     * @param string $groupId
     * @return array
     */
    public function generateInviteCode(string $groupId): array
    {
        return $this->send(['group_id' => $groupId]);
    }
    
    /**
     * Get the endpoint for the operation
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->operation;
    }
} 