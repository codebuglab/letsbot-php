<?php

namespace LetsBot\Api\Tests\Feature;

use LetsBot\Api\LetsBot;
use LetsBot\Api\Http\GuzzleClient;
use LetsBot\Api\Services\ButtonService;
use PHPUnit\Framework\TestCase;

/**
 * Test for button sending functionality
 */
class ButtonSendTest extends TestCase
{
    /**
     * @var string
     */
    protected $testPhone;
    
    /**
     * @var GuzzleClient
     */
    protected $httpClient;

    /**
     * Set up the test
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        // Get phone number from environment
        $this->testPhone = $_ENV['LETSBOT_TEST_PHONE'] ?? '966555000000';
        
        // Configure LetsBot
        LetsBot::$api_key = $_ENV['LETSBOT_API_KEY'] ?? '';
        LetsBot::$domain = $_ENV['LETSBOT_BASE_URL'] ?? 'https://letsbot.net/';
        LetsBot::$ssl_verify = true;
        
        // Create an HttpClient for testing
        $this->httpClient = new GuzzleClient();
        $this->httpClient->setApiKey($_ENV['LETSBOT_API_KEY'] ?? 'test_api_key');
        // Base URL is now fixed in the GuzzleClient
        $this->httpClient->setDomain('https://letsbot.net/');
    }

    /**
     * Test sending button message
     * 
     * @group integration
     * @group external-api
     */
    public function testSendButtons(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create button service
        $buttonService = ButtonService::regular($this->httpClient);

        // Sample buttons
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

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Button message sent successfully',
            'data' => [
                'id' => '123456789',
                'status' => 'sent',
            ],
        ];

        // Mock the HTTP client to return our fake response
        $mockHttpClient = $this->createMock(\LetsBot\Api\Contracts\HttpClientInterface::class);
        $mockHttpClient->method('post')
            ->willReturn($mockResponse);

        // Replace the real HTTP client with our mock
        $this->setPrivateProperty($buttonService, 'client', $mockHttpClient);

        // Send button message
        $response = $buttonService->sendButtons(
            $this->testPhone,
            'Would you like to proceed?',
            $buttons,
            'Choose one option'
        );

        // Assert response is as expected
        $this->assertIsArray($response);
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * Test sending image button message
     * 
     * @group integration
     * @group external-api
     */
    public function testSendImageButtons(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create image button service
        $buttonService = ButtonService::imageButton($this->httpClient);

        // Sample buttons
        $buttons = [
            [
                'id' => 'btn_view',
                'text' => 'View Details'
            ],
            [
                'id' => 'btn_buy',
                'text' => 'Buy Now'
            ]
        ];

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Image button message sent successfully',
            'data' => [
                'id' => '123456789',
                'status' => 'sent',
            ],
        ];

        // Mock the HTTP client to return our fake response
        $mockHttpClient = $this->createMock(\LetsBot\Api\Contracts\HttpClientInterface::class);
        $mockHttpClient->method('post')
            ->willReturn($mockResponse);

        // Replace the real HTTP client with our mock
        $this->setPrivateProperty($buttonService, 'client', $mockHttpClient);

        // Send image button message
        $response = $buttonService->sendMediaButton(
            $this->testPhone,
            'https://example.com/product.jpg',
            'New Product',
            $buttons,
            'Product image',
            'Choose an option'
        );

        // Assert response is as expected
        $this->assertIsArray($response);
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * Test sending template message
     * 
     * @group integration
     * @group external-api
     */
    public function testSendTemplate(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create template service
        $buttonService = ButtonService::template($this->httpClient);

        // Sample buttons
        $buttons = [
            [
                'type' => 'url',
                'title' => 'Visit Website',
                'url' => 'https://example.com'
            ],
            [
                'type' => 'phone',
                'title' => 'Contact Us',
                'phone' => '+966555000000'
            ]
        ];

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Template message sent successfully',
            'data' => [
                'id' => '123456789',
                'status' => 'sent',
            ],
        ];

        // Mock the HTTP client to return our fake response
        $mockHttpClient = $this->createMock(\LetsBot\Api\Contracts\HttpClientInterface::class);
        $mockHttpClient->method('post')
            ->willReturn($mockResponse);

        // Replace the real HTTP client with our mock
        $this->setPrivateProperty($buttonService, 'client', $mockHttpClient);

        // Send template message
        $response = $buttonService->sendTemplate(
            $this->testPhone,
            'Contact us for more information',
            $buttons,
            'Thank you for your interest'
        );

        // Assert response is as expected
        $this->assertIsArray($response);
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * Helper method to set private property values
     *
     * @param object $object
     * @param string $propertyName
     * @param mixed $value
     */
    private function setPrivateProperty($object, $propertyName, $value): void
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }
} 