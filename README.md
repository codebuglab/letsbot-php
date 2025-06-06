# LetsBot PHP Package

[![Tests](https://github.com/codebuglab/letsbot-php/workflows/Tests/badge.svg)](https://github.com/codebuglab/letsbot-php/actions)
[![codecov](https://codecov.io/gh/codebuglab/letsbot-php/branch/main/graph/badge.svg)](https://codecov.io/gh/codebuglab/letsbot-php)
[![Total Downloads](https://img.shields.io/packagist/dt/codebuglab/letsbot-php.svg?style=flat-square)](https://packagist.org/packages/codebuglab/letsbot-php)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebuglab/letsbot-php.svg?style=flat-square)](https://packagist.org/packages/codebuglab/letsbot-php)
[![License](https://img.shields.io/packagist/l/codebuglab/letsbot-php.svg?style=flat-square)](https://packagist.org/packages/codebuglab/letsbot-php)

A comprehensive PHP package for integrating with the LetsBot WhatsApp API. This package provides a powerful, easy-to-use interface to leverage WhatsApp's extensive messaging capabilities in your PHP applications.

> LetsBot transforms business messaging by providing access to WhatsApp's platform, used by 2 billion people worldwide with 60 billion daily messages. Our RESTful API enables you to connect your WhatsApp number to various third-party systems, programming languages, CMS, CRMs & CLI tools with minimal hassle and no complex dependencies.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Basic Usage](#basic-usage)
- [API Features](#api-features)
- [Documentation](#documentation)
- [Testing](#testing)
- [Compatibility](#compatibility)
- [License](#license)
- [Support](#support)

## Requirements

- PHP 7.4 or higher
- Guzzle HTTP 7.0 or higher
- A LetsBot account with API credentials

## Installation

### Laravel

If you're using Laravel, install the package via Composer:

```bash
composer require codebuglab/letsbot-php
```

After installation, publish the configuration file:

```bash
php artisan vendor:publish --tag=letsbot-config
```

You can find the config file in `config/letsbot.php`.

### PHP Native

For PHP native or OOP applications:

```php
require 'vendor/autoload.php';

$lb = (new \LetsBot\Api\LetsBot);
$lb::$api_key = 'your_api_key'; // Set API key
$lb::$ssl_verify = false; // Set SSL verification (true/false, default is true)

$result = $lb->ChatList()->send();
echo json_encode($result);
```

## Configuration

The configuration file contains essential settings for the API connection:

```php
return [
  'api_key' => env('LETS_BOT_API_KEY', 'test'),
  'ssl_verify' => true,
];
```

- `api_key`: Your API key generated from the LetsBot dashboard
- `ssl_verify`: This option can disable SSL certificate verification if you're in development. Set to `false` to skip SSL certificate errors.

## Basic Usage

The package provides an alias `LetsBot\Api\LetsBot::class` for easy use:

```php
// In Laravel
use LetsBot;

return LetsBot::sessionStatus()->send();

// OR use the helper function
return lb()->sessionStatus()->send();
```

All methods follow a common pattern:

1. Fluent interface:
   ```php
   LetsBot::method()->param1(value)->param2(value)->send();
   ```

2. Array parameter:
   ```php
   LetsBot::method()->send([
     'param1' => value,
     'param2' => value
   ]);
   ```

### Example: Sending a Text Message

```php
// Fluent interface
LetsBot::message()
    ->phone('1234567890')
    ->body('Hello from LetsBot!')
    ->send();
```

## API Features

The LetsBot PHP package provides comprehensive access to all WhatsApp Business API features:

- **Message Operations** - Send texts, react to messages, reply to specific messages, mentions, and more
- **Media Messages** - Share images, videos, documents, audio clips, and other media content
- **Interactive Messages** - Create button messages, list messages, and other interactive content
- **Chat Operations** - Manage chats, set status, archive conversations, and more
- **Group Operations** - Create and manage groups, add/remove participants, and group settings
- **User Operations** - Check presence, manage profiles, block/unblock users
- **Product Operations** - Manage product catalogs and listings
- **Instance Operations** - Manage your WhatsApp instance settings and status
- **Authentication** - Handle QR codes and session management

## Documentation

For detailed documentation on all available features and methods, please refer to the following guides:

- [Message Operations](src/Docs/Message.md) - Text messages, stickers, reactions, replies, and message management
- [Media Messages](src/Docs/Media.md) - Images, videos, files, audio, and other media types
- [Button Messages](src/Docs/Buttons.md) - Interactive button messages with various configurations
- [List Messages](src/Docs/ListMessage.md) - Structured lists with sections and items
- [Chat Operations](src/Docs/Chat.md) - Managing conversations and chat settings
- [Group Operations](src/Docs/Groups.md) - Creating and managing groups
- [User Operations](src/Docs/User.md) - User management and profiles
- [Product Operations](src/Docs/Products.md) - Product catalogs and management
- [Instance Operations](src/Docs/Instance.md) - Instance configuration and status
- [QR Code and Sessions](src/Docs/QrAndSesstions.md) - Authentication and session management

## Testing

The package includes comprehensive test coverage. To run tests:

```bash
composer test
```

To generate code coverage reports:

```bash
composer test-coverage
```

This will generate an HTML code coverage report in the `coverage` directory.

## Compatibility

This package is tested with PHP 7.4, 8.0, 8.1, and 8.2 to ensure maximum compatibility across different environments and projects.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support

Need assistance? Contact the LetsBot support team:

- Email: sales@letsbot.net
- Phone/WhatsApp: +966559408401
- Documentation: [https://docs.letsbot.net](https://docs.letsbot.net)