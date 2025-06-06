<?php

namespace LetsBot\Api\Tests\Feature;

use LetsBot\Api\LetsBot;
use LetsBot\Api\Http\GuzzleClient;
use LetsBot\Api\Services\MediaService;
use PHPUnit\Framework\TestCase;

/**
 * Test for media sending functionality
 */
class MediaSendTest extends TestCase
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
     * Test sending an image
     * 
     * @group integration
     * @group external-api
     */
    public function testSendImage(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create an image service
        $imageService = MediaService::image($this->httpClient);

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Message sent successfully',
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
        $this->setPrivateProperty($imageService, 'client', $mockHttpClient);

        // Send an image
        $response = $imageService->send([
            'to' => $this->testPhone,
            'url' => 'https://example.com/image.jpg',
            'caption' => 'Test image caption'
        ]);

        // Assert response is as expected
        $this->assertIsArray($response);
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * Test sending location
     * 
     * @group integration
     * @group external-api
     */
    public function testSendLocation(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create a location service
        $locationService = MediaService::location($this->httpClient);

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Location sent successfully',
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
        $this->setPrivateProperty($locationService, 'client', $mockHttpClient);

        // Send a location
        $response = $locationService->sendLocation(
            $this->testPhone,
            24.7136,
            46.6753,
            'Riyadh',
            'King Fahd Road, Riyadh, Saudi Arabia'
        );

        // Assert response is as expected
        $this->assertIsArray($response);
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * Test sending contact
     * 
     * @group integration
     * @group external-api
     */
    public function testSendContact(): void
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create a contact service
        $contactService = MediaService::contactMessage($this->httpClient);

        // Mock response data
        $mockResponse = [
            'success' => true,
            'message' => 'Contact sent successfully',
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
        $this->setPrivateProperty($contactService, 'client', $mockHttpClient);

        // Send a contact
        $response = $contactService->sendContact(
            $this->testPhone,
            '966555000000',
            'Mohammed',
            'Ahmed'
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