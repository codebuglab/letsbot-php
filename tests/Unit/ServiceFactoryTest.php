<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\ServiceFactory;
use LetsBot\Api\Services\MessageService;
use LetsBot\Api\Services\MediaService;
use LetsBot\Api\Services\ButtonService;
use LetsBot\Api\Services\GroupService;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Test the ServiceFactory implementation
 */
class ServiceFactoryTest extends TestCase
{
    /**
     * Test creating a message service
     */
    public function testCreateMessageService()
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $service = $factory->createService('message');
        
        $this->assertInstanceOf(MessageService::class, $service);
    }
    
    /**
     * Test creating a non-existent service
     */
    public function testCreateNonExistentService()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $factory->createService('non_existent');
    }
    
    /**
     * Test registering a custom service
     */
    public function testRegisterCustomService()
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $factory->registerService('custom', MessageService::class);
        $service = $factory->createService('custom');
        
        $this->assertInstanceOf(MessageService::class, $service);
    }
    
    /**
     * Test creating media services
     * 
     * @dataProvider mediaServicesProvider
     */
    public function testCreateMediaServices(string $serviceName)
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $service = $factory->createService($serviceName);
        
        $this->assertInstanceOf(MediaService::class, $service);
    }
    
    /**
     * Data provider for media services
     */
    public static function mediaServicesProvider(): array
    {
        return [
            ['file'],
            ['image'],
            ['video'],
            ['audio'],
            ['gif'],
            ['ptt'],
            ['location'],
            ['contact']
        ];
    }
    
    /**
     * Test creating button services
     * 
     * @dataProvider buttonServicesProvider
     */
    public function testCreateButtonServices(string $serviceName)
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $service = $factory->createService($serviceName);
        
        $this->assertInstanceOf(ButtonService::class, $service);
    }
    
    /**
     * Data provider for button services
     */
    public static function buttonServicesProvider(): array
    {
        return [
            ['button'],
            ['image_button'],
            ['video_button'],
            ['location_button'],
            ['document_button'],
            ['template_button'],
            ['image_template'],
            ['video_template'],
            ['document_template'],
            ['location_template']
        ];
    }
    
    /**
     * Test creating group services
     * 
     * @dataProvider groupServicesProvider
     */
    public function testCreateGroupServices(string $serviceName)
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $factory = new ServiceFactory($httpClient);
        
        $service = $factory->createService($serviceName);
        
        $this->assertInstanceOf(GroupService::class, $service);
    }
    
    /**
     * Data provider for group services
     */
    public static function groupServicesProvider(): array
    {
        return [
            ['group'],
            ['group_list'],
            ['group_create'],
            ['group_join'],
            ['group_invite']
        ];
    }
    
    /**
     * Clean up Mockery
     */
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
} 