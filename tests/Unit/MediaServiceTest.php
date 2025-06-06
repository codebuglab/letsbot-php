<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Services\MediaService;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Test the MediaService implementation
 */
class MediaServiceTest extends TestCase
{
    /**
     * Test sending media with URL and caption
     */
    public function testSendMedia()
    {
        $expectedData = [
            'to' => '123456789',
            'url' => 'https://example.com/image.jpg',
            'caption' => 'Test caption'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('image', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = MediaService::image($httpClient);
        $result = $service->sendMedia('123456789', 'https://example.com/image.jpg', 'Test caption');
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending media with phone method
     */
    public function testPhoneParameter()
    {
        $expectedData = [
            'to' => '123456789',
            'url' => 'https://example.com/file.pdf'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('file', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = MediaService::file($httpClient);
        $service->phone('123456789');
        $result = $service->send([
            'url' => 'https://example.com/file.pdf'
        ]);
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending location
     */
    public function testSendLocation()
    {
        $expectedData = [
            'to' => '123456789',
            'latitude' => 24.7136,
            'longitude' => 46.6753,
            'name' => 'Riyadh',
            'address' => 'King Fahd Road, Riyadh, Saudi Arabia'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('location', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = MediaService::location($httpClient);
        $result = $service->sendLocation(
            '123456789',
            24.7136,
            46.6753,
            'Riyadh',
            'King Fahd Road, Riyadh, Saudi Arabia'
        );
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending contact
     */
    public function testSendContact()
    {
        $expectedData = [
            'to' => '123456789',
            'phone' => '966555000000',
            'first_name' => 'Mohammed',
            'last_name' => 'Ahmed'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('contact', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = MediaService::contactMessage($httpClient);
        $result = $service->sendContact(
            '123456789',
            '966555000000',
            'Mohammed',
            'Ahmed'
        );
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending location through send method
     */
    public function testSendLocationThroughSendMethod()
    {
        $expectedData = [
            'to' => '123456789',
            'latitude' => 24.7136,
            'longitude' => 46.6753,
            'name' => 'Riyadh'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('location', [
                'to' => '123456789',
                'latitude' => 24.7136,
                'longitude' => 46.6753,
                'name' => 'Riyadh'
            ])
            ->andReturn(['success' => true]);
            
        $service = MediaService::location($httpClient);
        $result = $service->send($expectedData);
        
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