<?php

namespace LetsBot\Api;

use LetsBot\Api\Contracts\ServiceInterface;
use LetsBot\Api\Http\GuzzleClient;

/**
 * Facade for LetsBot API
 */
class LetsBotFacade
{
    /**
     * @var ServiceFactory
     */
    protected static $serviceFactory;
    
    /**
     * @var GuzzleClient
     */
    protected static $httpClient;
    
    /**
     * @var array
     */
    protected static $serviceMethodMap = [
        'message' => 'message',
        'sticker' => 'sticker',
        'react' => 'react',
        'reply' => 'reply',
        'mentions' => 'mention',
        'disappearing' => 'disappearing',
        'shareCatalog' => 'catalog',
        'getMessage' => 'get',
        'deleteMessage' => 'delete',
        'fetch' => 'fetch',
        // Add more mappings here
    ];
    
    /**
     * @var string
     */
    protected static $currentMethod;

    /**
     * Initialize the facade
     *
     * @return void
     */
    protected static function initialize(): void
    {
        if (static::$httpClient === null) {
            static::$httpClient = new GuzzleClient();
            
            // Set configuration from LetsBot
            if (isset(LetsBot::$api_key)) {
                static::$httpClient->setApiKey(LetsBot::$api_key);
            }
            
            if (isset(LetsBot::$domain)) {
                static::$httpClient->setDomain(LetsBot::$domain);
            }
            
            if (isset(LetsBot::$ssl_verify)) {
                static::$httpClient->setSSLVerify(LetsBot::$ssl_verify);
            }
            
            static::$serviceFactory = new ServiceFactory(static::$httpClient);
        }
    }
    
    /**
     * Magic static method handler
     *
     * @param string $name Method name
     * @param array $arguments Method arguments
     * @return ServiceInterface
     */
    public static function __callStatic($name, $arguments)
    {
        static::initialize();
        
        // Check if the method exists in the map
        if (isset(static::$serviceMethodMap[$name])) {
            static::$currentMethod = static::$serviceMethodMap[$name];
            return static::createMessageService();
        }
        
        return new LetsBot();
    }
    
    /**
     * Create a message service
     *
     * @return ServiceInterface
     */
    protected static function createMessageService(): ServiceInterface
    {
        return static::$serviceFactory->createService('message');
    }
} 