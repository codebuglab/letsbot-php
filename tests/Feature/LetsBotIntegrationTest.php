<?php

namespace LetsBot\Api\Tests\Feature;

use LetsBot\Api\LetsBot;
use LetsBot\Api\Http\GuzzleClient;
use LetsBot\Api\ServiceFactory;
use LetsBot\Api\LetsBotFacade;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;
use ReflectionClass;

/**
 * Test the LetsBot integration
 */
class LetsBotIntegrationTest extends TestCase
{
    /**
     * Set up the test
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        // Reset static properties on LetsBot
        LetsBot::$api_key = 'test-key';
        LetsBot::$domain = 'https://test.com';
        LetsBot::$ssl_verify = false;
    }
    
    /**
     * Test the legacy interface using static methods
     */
    public function testLegacyStaticInterface()
    {
        // We cannot easily mock the static methods, but we can validate the class structure
        $this->assertTrue(method_exists(LetsBot::class, 'message'));
        $this->assertTrue(method_exists(LetsBot::class, 'sticker'));
        $this->assertTrue(method_exists(LetsBot::class, 'send'));
    }
    
    /**
     * Test the helper function
     */
    public function testHelperFunction()
    {
        if (function_exists('lb')) {
            $letsbot = lb();
            $this->assertInstanceOf(LetsBot::class, $letsbot);
        } else {
            $this->markTestSkipped('Helper function lb() is not available.');
        }
    }
    
    /**
     * Test that we can set up the facade properly
     */
    public function testFacadeSetup()
    {
        $facade = new LetsBotFacade();
        
        // Use reflection to check if the httpClient is properly set up
        $reflector = new ReflectionClass(LetsBotFacade::class);
        
        $httpClientProp = $reflector->getProperty('httpClient');
        $httpClientProp->setAccessible(true);
        
        $serviceFactoryProp = $reflector->getProperty('serviceFactory');
        $serviceFactoryProp->setAccessible(true);
        
        // Initialize the facade
        $initializeMethod = $reflector->getMethod('initialize');
        $initializeMethod->setAccessible(true);
        $initializeMethod->invoke(null);
        
        // Check that httpClient is now set
        $this->assertNotNull($httpClientProp->getValue());
        
        // Check that serviceFactory is now set
        $this->assertNotNull($serviceFactoryProp->getValue());
    }
} 