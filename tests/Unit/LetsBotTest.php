<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\LetsBot;
use PHPUnit\Framework\TestCase;
use Mockery;

class LetsBotTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Setup test environment
        LetsBot::$api_key = 'test_api_key';
        LetsBot::$domain = 'https://api.example.com';
        LetsBot::$ssl_verify = false;
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testInitialization()
    {
        $this->assertEquals('test_api_key', LetsBot::$api_key);
        $this->assertEquals('https://api.example.com', LetsBot::$domain);
        $this->assertFalse(LetsBot::$ssl_verify);
    }
} 