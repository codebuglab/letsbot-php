# Message Operations

This documentation covers various message operations available in the LetsBot API.

## Basic Messages

### Text Message

Send a simple text message:

```php
// Method 1: Fluent interface
LetsBot::message()
    ->phone($phone)
    ->body('Hi')
    ->send();

// Method 2: Array parameter
LetsBot::message()->send([
    'phone' => $phone,
    'body' => 'Hi'
]);
```

### Sticker Message

Send a sticker:

```php
// Method 1: Array parameter
LetsBot::sticker()->send([
    'phone' => $phone,
    'url' => $url
]);

// Method 2: Fluent interface
LetsBot::sticker()
    ->phone($phone)
    ->url($url)
    ->send();
```

## Message Interactions

### React to Message

Add a reaction to an existing message:

```php
// Method 1: Fluent interface
LetsBot::react()
    ->phone($phone)
    ->reaction('❤️')
    ->messageId('BAE5A8F8F8E0278E')
    ->send();

// Method 2: Array parameter
LetsBot::react()->send([
    'phone' => $phone,
    'reaction' => '❤️',
    'messageId' => 'BAE5A8F8F8E0278E'
]);
```

### Reply to Message

Reply to a specific message:

```php
// Method 1: Fluent interface
LetsBot::reply()
    ->phone($phone)
    ->body('Reply message')
    ->messageId('BAE5A8F8F8E0278E')
    ->send();

// Method 2: Array parameter
LetsBot::reply()->send([
    'phone' => $phone,
    'body' => 'Reply message',
    'messageId' => 'BAE5A8F8F8E0278E'
]);
```

### Mention User

Mention a user in a message:

```php
// Method 1: Array parameter
LetsBot::mentions()->send([
    'phone' => $phone,
    'mention' => $mentionPhone,
]);

// Method 2: Fluent interface
LetsBot::mentions()
    ->phone($phone)
    ->mention($mentionPhone)
    ->send();
```

## Special Message Types

### Disappearing Message

Send a message that will disappear after a specified time:

```php
// Method 1: Fluent interface
LetsBot::disappearing()
    ->phone($phone)
    ->duration(60)  // Time in seconds (optional, default is 7 days)
    ->body('This is a disappearing message')
    ->send();

// Method 2: Array parameter
LetsBot::disappearing()->send([
    'phone' => $phone,
    'duration' => 60,  // Time in seconds (optional, default is 7 days)
    'body' => 'This is a disappearing message that will disappear after X duration',
]);
```

### Share Catalog

Share a catalog with a user:

```php
// Method 1: Fluent interface
LetsBot::shareCatalog()
    ->phone($phone)
    ->catalog($catalogPhone)
    ->title('Catalog title')
    ->description('Catalog description')
    ->body('Catalog body text')
    ->send();

// Method 2: Array parameter
LetsBot::shareCatalog()->send([
    'phone' => $phone,
    'catalog' => $catalogPhone,
    'title' => 'Catalog title',
    'description' => 'Catalog description',
    'body' => 'Catalog body text',
]);
```

## Message Management

### Get Message by ID

Retrieve a message using its ID:

```php
// Method 1: Array parameter
LetsBot::getMessage()->send([
    'phone' => $phone,
    'messageID' => 'BAE58D401B46E348',
]);

// Method 2: Fluent interface
LetsBot::getMessage()
    ->phone($phone)
    ->id('BAE58D401B46E348')
    ->send();
```

### Delete Message by ID

Delete a specific message:

```php
// Method 1: Fluent interface
LetsBot::deleteMessage()
    ->phone($phone)
    ->id('BAE58D401B46E348')
    ->send();

// Method 2: Array parameter
LetsBot::deleteMessage()->send([
    'phone' => $phone,
    'messageID' => 'BAE58D401B46E348',
]);
```

### Fetch Messages

Retrieve recent messages:

```php
// Method 1: Array parameter
LetsBot::fetch()->send([
    'limit' => 5,  // Optional: number of messages to retrieve
]);

// Method 2: Fluent interface
LetsBot::fetch()
    ->limit(5)  // Optional: number of messages to retrieve
    ->send();
```
