<?php

namespace LetsBot\Api\Tests\Unit;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Services\GroupService;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Test the GroupService implementation
 */
class GroupServiceTest extends TestCase
{
    /**
     * Test creating a group
     */
    public function testCreateGroup()
    {
        $expectedData = [
            'name' => 'Test Group'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('group/create', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = GroupService::create($httpClient);
        $result = $service->createGroup('Test Group');
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test getting all groups
     */
    public function testGetGroups()
    {
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('group/list', [])
            ->andReturn(['success' => true, 'groups' => []]);
            
        $service = GroupService::list($httpClient);
        $result = $service->getGroups();
        
        $this->assertEquals(['success' => true, 'groups' => []], $result);
    }
    
    /**
     * Test joining a group
     */
    public function testJoinGroup()
    {
        $expectedData = [
            'code' => 'invite_code_123'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('group/join', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = GroupService::join($httpClient);
        $result = $service->joinGroup('invite_code_123');
        
        $this->assertEquals(['success' => true], $result);
    }
    
    /**
     * Test generating invite code
     */
    public function testGenerateInviteCode()
    {
        $expectedData = [
            'group_id' => '123456789'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('group/invite', $expectedData)
            ->andReturn(['success' => true, 'code' => 'new_invite_code']);
            
        $service = GroupService::generateInvite($httpClient);
        $result = $service->generateInviteCode('123456789');
        
        $this->assertEquals(['success' => true, 'code' => 'new_invite_code'], $result);
    }
    
    /**
     * Test phone parameter
     */
    public function testPhoneParameter()
    {
        $expectedData = [
            'phone' => '123456789',
            'name' => 'Test Group'
        ];
        
        $httpClient = Mockery::mock(HttpClientInterface::class);
        $httpClient->shouldReceive('post')
            ->once()
            ->with('group/create', $expectedData)
            ->andReturn(['success' => true]);
            
        $service = GroupService::create($httpClient);
        $service->phone('123456789');
        $result = $service->send(['name' => 'Test Group']);
        
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