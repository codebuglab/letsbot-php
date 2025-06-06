<?php

namespace LetsBot\Api;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Contracts\ServiceInterface;
use LetsBot\Api\Services\ButtonService;
use LetsBot\Api\Services\GroupService;
use LetsBot\Api\Services\MediaService;
use LetsBot\Api\Services\MessageService;

/**
 * Factory for creating service instances
 */
class ServiceFactory
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $services = [];

    /**
     * Create a new service factory
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->registerDefaultServices();
    }

    /**
     * Register default services
     *
     * @return void
     */
    protected function registerDefaultServices(): void
    {
        $this->services = [
            // Message services
            'message' => MessageService::class,
            
            // Media services
            'file' => MediaService::class,
            'image' => MediaService::class,
            'video' => MediaService::class,
            'audio' => MediaService::class,
            'gif' => MediaService::class,
            'ptt' => MediaService::class,
            'location' => MediaService::class,
            'contact' => MediaService::class,
            
            // Group services
            'group' => GroupService::class,
            'group_list' => GroupService::class,
            'group_create' => GroupService::class,
            'group_join' => GroupService::class,
            'group_invite' => GroupService::class,
            
            // Button services
            'button' => ButtonService::class,
            'image_button' => ButtonService::class,
            'video_button' => ButtonService::class,
            'location_button' => ButtonService::class,
            'document_button' => ButtonService::class,
            
            // Template button services
            'template_button' => ButtonService::class,
            'image_template' => ButtonService::class,
            'video_template' => ButtonService::class,
            'document_template' => ButtonService::class,
            'location_template' => ButtonService::class,
        ];
    }

    /**
     * Create a new service instance
     *
     * @param string $name
     * @return ServiceInterface
     * @throws \InvalidArgumentException
     */
    public function createService(string $name): ServiceInterface
    {
        if (!isset($this->services[$name])) {
            throw new \InvalidArgumentException("Service '{$name}' is not registered.");
        }

        $serviceClass = $this->services[$name];
        
        // Special handling for different service types
        switch ($name) {
            // Media services
            case 'file':
                return MediaService::file($this->httpClient);
            case 'image':
                return MediaService::image($this->httpClient);
            case 'video':
                return MediaService::video($this->httpClient);
            case 'audio':
                return MediaService::audio($this->httpClient);
            case 'gif':
                return MediaService::gif($this->httpClient);
            case 'ptt':
                return MediaService::ptt($this->httpClient);
            case 'location':
                return MediaService::location($this->httpClient);
            case 'contact':
                return MediaService::contactMessage($this->httpClient);
                
            // Group services
            case 'group':
                return new GroupService($this->httpClient);
            case 'group_list':
                return GroupService::list($this->httpClient);
            case 'group_create':
                return GroupService::create($this->httpClient);
            case 'group_join':
                return GroupService::join($this->httpClient);
            case 'group_invite':
                return GroupService::generateInvite($this->httpClient);
                
            // Button services
            case 'button':
                return ButtonService::regular($this->httpClient);
            case 'image_button':
                return ButtonService::imageButton($this->httpClient);
            case 'video_button':
                return ButtonService::videoButton($this->httpClient);
            case 'location_button':
                return ButtonService::locationButton($this->httpClient);
            case 'document_button':
                return ButtonService::documentButton($this->httpClient);
                
            // Template button services
            case 'template_button':
                return ButtonService::template($this->httpClient);
            case 'image_template':
                return ButtonService::imageTemplate($this->httpClient);
            case 'video_template':
                return ButtonService::videoTemplate($this->httpClient);
            case 'document_template':
                return ButtonService::documentTemplate($this->httpClient);
            case 'location_template':
                return ButtonService::locationTemplate($this->httpClient);
                
            // Default case
            default:
                return new $serviceClass($this->httpClient);
        }
    }

    /**
     * Register a custom service
     *
     * @param string $name
     * @param string $class
     * @return void
     */
    public function registerService(string $name, string $class): void
    {
        $this->services[$name] = $class;
    }
} 