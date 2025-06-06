<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Services\ButtonService;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Test the ButtonService implementation
 */
class ButtonServiceTest extends TestCase
{
    /**
     * Test setting button parameters using method chaining
     */
    public function testSendButtons()
    {
        $buttons = [
            [
                'id' => 'btn_yes',
                'text' => 'Yes'
            ],
            [
                'id' => 'btn_no',
                'text' => 'No'
            ]
        ];
        
        $expectedData = [
            'to' => '123456789',
            'text' => 'Would you like to proceed?',
            'buttons' => $buttons,
            'footer' => 'Choose one option'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('button', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = ButtonService::regular($httpClient);
        $result = $service->sendButtons(
            '123456789',
            'Would you like to proceed?',
            $buttons,
            'Choose one option'
        );
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test setting button phone parameter
     */
    public function testPhoneParameter()
    {
        $buttons = [
            [
                'id' => 'btn_yes',
                'text' => 'Yes'
            ]
        ];
        
        $expectedData = [
            'to' => '123456789',
            'text' => 'Test button',
            'buttons' => $buttons
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('button', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = ButtonService::regular($httpClient);
        $service->phone('123456789');
        $result = $service->send([
            'text' => 'Test button',
            'buttons' => $buttons
        ]);
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending media button
     */
    public function testSendMediaButton()
    {
        $buttons = [
            [
                'id' => 'btn_view',
                'text' => 'View Details'
            ]
        ];
        
        $expectedData = [
            'to' => '123456789',
            'url' => 'https://example.com/image.jpg',
            'text' => 'Product Image',
            'buttons' => $buttons,
            'caption' => 'Check this out',
            'footer' => 'Optional footer'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('image_button', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = ButtonService::imageButton($httpClient);
        $result = $service->sendMediaButton(
            '123456789',
            'https://example.com/image.jpg',
            'Product Image',
            $buttons,
            'Check this out',
            'Optional footer'
        );
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test sending template
     */
    public function testSendTemplate()
    {
        $buttons = [
            [
                'type' => 'url',
                'title' => 'Visit Site',
                'url' => 'https://example.com'
            ]
        ];
        
        $expectedData = [
            'to' => '123456789',
            'text' => 'Visit our website',
            'buttons' => $buttons,
            'footer' => 'Thanks'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('template_button', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = ButtonService::template($httpClient);
        $result = $service->sendTemplate(
            '123456789',
            'Visit our website',
            $buttons,
            'Thanks'
        );
        
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