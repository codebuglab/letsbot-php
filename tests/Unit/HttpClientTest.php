<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Http\GuzzleClient;
use PHPUnit\Framework\TestCase;

/**
 * Test the GuzzleClient implementation
 */
class HttpClientTest extends TestCase
{
    /**
     * Test setting configuration values
     */
    public function testConfigurationSetting()
    {
        $client = new GuzzleClient();
        
        $this->assertInstanceOf(GuzzleClient::class, $client->setApiKey('test-key'));
        $this->assertInstanceOf(GuzzleClient::class, $client->setDomain('https://test.com'));
        $this->assertInstanceOf(GuzzleClient::class, $client->setSSLVerify(false));
    }

    /**
     * Test interface implementation
     */
    public function testImplementsHttpClientInterface()
    {
        $client = new GuzzleClient();
        $this->assertInstanceOf(HttpClientInterface::class, $client);
    }
} 