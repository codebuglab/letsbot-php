# Testing LetsBot PHP Client

This document explains how to run the tests for the LetsBot PHP client library.

## Prerequisites

- PHP 7.4 or higher
- Composer

## Installation

1. Clone the repository
2. Install dependencies:

```bash
composer install
```

## Setting Up PHPUnit Configuration

The project includes a template configuration file `phpunit.xml.dist`. Before running tests, create your own local configuration:

1. Copy the template to create your local configuration:

```bash
cp phpunit.xml.dist phpunit.xml
```

2. Edit `phpunit.xml` to update the environment variables with your own API credentials:

```xml
<php>
  <env name="LETSBOT_API_KEY" value="your_api_key_here"/>
  <env name="LETSBOT_BASE_URL" value="https://letsbot.net/"/>
  <env name="LETSBOT_TEST_PHONE" value="your_test_phone_number"/>
</php>
```

> **Note:** The `phpunit.xml` file is ignored by Git to prevent committing your sensitive API credentials.

## Running Tests

To run all tests:

```bash
./vendor/bin/phpunit
```

To run a specific test suite:

```bash
./vendor/bin/phpunit --testsuite Unit
```

To run a specific test file:

```bash
./vendor/bin/phpunit tests/Unit/HttpClientTest.php
```

## Test Structure

The tests are organized into two main categories:

### Unit Tests

Located in `tests/Unit/`, these tests verify individual components in isolation:

- `HttpClientTest.php` - Tests the Guzzle HTTP client wrapper
- `MessageServiceTest.php` - Tests the Message service
- `ServiceFactoryTest.php` - Tests the service factory
- `ButtonServiceTest.php` - Tests the Button service
- `GroupServiceTest.php` - Tests the Group service
- `MediaServiceTest.php` - Tests the Media service

### Feature Tests

Located in `tests/Feature/`, these tests verify the integration between components:

- `LetsBotIntegrationTest.php` - Tests the LetsBot facade and integration between components
- `MessageSendTest.php` - Tests sending messages through the API

## Code Architecture

The library has been refactored to use a more testable architecture while maintaining backward compatibility:

1. **Interfaces** - Define contracts for components
   - `HttpClientInterface` - Contract for HTTP clients
   - `ServiceInterface` - Contract for API services

2. **Implementations**
   - `GuzzleClient` - HTTP client implementation using Guzzle
   - `MessageService` - Service for sending messages
   - `ServiceFactory` - Factory for creating service instances

3. **Facade**
   - `LetsBotFacade` - Provides a static interface to the services
   - `LetsBot` - Maintains backward compatibility with the original API

## Mocking Dependencies

The tests use PHPUnit's mocking capabilities and Mockery to isolate components:

```php
$httpClient = Mockery::mock(HttpClientInterface::class);
$httpClient->shouldReceive('post')
    ->once()
    ->with('message/send', ['phone' => '123456789', 'body' => 'Test message'])
    ->andReturn(['success' => true]);
```

## Continuous Integration

To integrate these tests into a CI pipeline, you can use the following command:

```bash
./vendor/bin/phpunit --coverage-text
```

This will run all tests and generate a coverage report in text format. For code coverage to work, you'll need to have either Xdebug or PCOV extension installed. 