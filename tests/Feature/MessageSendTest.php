<?php

namespace LetsBot\Api\Tests\Feature;

use LetsBot\Api\LetsBot;
use LetsBot\Api\Http\GuzzleClient;
use LetsBot\Api\Services\MessageService;
use PHPUnit\Framework\TestCase;

/**
 * Test sending messages using LetsBot API
 */
class MessageSendTest extends TestCase
{
    /**
     * @var string
     */
    protected $testPhone;

    /**
     * Set up the test environment
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
    }
    
    /**
     * Test sending a message using the new architecture
     * 
     * @group integration
     * @group external-api
     */
    public function testSendMessageWithNewArchitecture()
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Create HTTP client and service
        $httpClient = new GuzzleClient();
        $httpClient->setApiKey(LetsBot::$api_key);
        $httpClient->setDomain(LetsBot::$domain);
        
        // Create message service
        $messageService = new MessageService($httpClient);
        
        // Send a test message
        $result = $messageService->send([
            'phone' => $this->testPhone,
            'body' => 'Test message sent from unit test - ' . date('Y-m-d H:i:s')
        ]);
        
        // Check for success response
        $this->assertIsArray($result);
        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
    }
    
    /**
     * Test sending a message using legacy interface
     * 
     * @group integration
     * @group external-api
     */
    public function testSendMessageWithLegacyInterface()
    {
        // Only run this test if we have API key
        if (empty(LetsBot::$api_key)) {
            $this->markTestSkipped('API key is required for this test');
        }
        
        // Send message using legacy interface
        $result = LetsBot::message()->send([
            'phone' => $this->testPhone,
            'body' => 'Test message sent from legacy interface - ' . date('Y-m-d H:i:s')
        ]);
        
        // Check for success response
        $this->assertIsArray($result);
        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
    }
} 