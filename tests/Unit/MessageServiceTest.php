<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Services\MessageService;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Test the MessageService implementation
 */
class MessageServiceTest extends TestCase
{
    /**
     * Test setting message parameters using method chaining
     */
    public function testParameterMethodChaining()
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('message/send', ['phone' => '123456789', 'body' => 'Test message'])
            ->andReturn(['success' => true]);
            
        $service = new MessageService($httpClient);
        $service->phone('123456789');
        // Using __call magic method for body
        $service->body('Test message');
        $result = $service->send();
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending message with params array
     */
    public function testSendWithParamsArray()
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('message/send', ['phone' => '123456789', 'body' => 'Test message'])
            ->andReturn(['success' => true]);
            
        $service = new MessageService($httpClient);
        $result = $service->send(['phone' => '123456789', 'body' => 'Test message']);
        
        $this->assertEquals(['success' => true], $result);
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