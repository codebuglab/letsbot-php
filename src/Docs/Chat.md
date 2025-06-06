# Chat Operations

This documentation covers chat-related operations in the LetsBot API.

## Chat Listing

### Get Chat List

Retrieve a list of all chats:

```php
// Get all chats
LetsBot::ChatList()->send();
```

### Get Chat Conversation

Retrieve messages from a specific chat:

```php
// Method 1: Array parameter
LetsBot::getChat()->send([
    'phone' => $phone,
    'limit' => 25,                // Maximum number of messages to retrieve
    'cursorId' => 'MESSAGE_ID',   // Start from this message ID
    'cursorFromMe' => true        // Whether cursor ID is from your messages
]);

// Method 2: Fluent interface
LetsBot::getChat()
    ->phone($phone)
    ->limit(25)
    ->cursorId('MESSAGE_ID')
    ->cursorFromMe(true)
    ->send();
```

### Get Contacts

Get a list of all contacts:

```php
// Get all contacts
LetsBot::contacts()->send();
```

## Chat Status

### Set Typing Status

Show typing indicator in a chat:

```php
// Method 1: Array parameter
LetsBot::typing()->send([
    'chat' => $phone  // Phone number or group JID
]);

// Method 2: Fluent interface
LetsBot::typing()
    ->chat($phone)    // Phone number or group JID
    ->send();
```

### Set Recording Status

Show recording indicator in a chat:

```php
// Method 1: Array parameter
LetsBot::recording()->send([
    'chat' => $phone  // Phone number or group JID
]);

// Method 2: Fluent interface
LetsBot::recording()
    ->chat($phone)    // Phone number or group JID
    ->send();
```

## Read Status

### Mark Chat as Read

Mark all messages in a chat as read:

```php
// Method 1: Array parameter
LetsBot::readChat()->send([
    'phone' => $phone
]);

// Method 2: Fluent interface
LetsBot::readChat()
    ->phone($phone)
    ->send();
```

### Mark Chat as Unread

Mark a chat as unread:

```php
// Method 1: Array parameter
LetsBot::unreadChat()->send([
    'phone' => $phone
]);

// Method 2: Fluent interface
LetsBot::unreadChat()
    ->phone($phone)
    ->send();
```

## Chat Organization

### Archive Chat

Archive a chat:

```php
// Method 1: Array parameter
LetsBot::archiveChat()->send([
    'phone' => $phone
]);

// Method 2: Fluent interface
LetsBot::archiveChat()
    ->phone($phone)
    ->send();
```

### Unarchive Chat

Unarchive a previously archived chat:

```php
// Method 1: Array parameter
LetsBot::unarchiveChat()->send([
    'phone' => $phone
]);

// Method 2: Fluent interface
LetsBot::unarchiveChat()
    ->phone($phone)
    ->send();
```

### Pin Chat

Pin a chat or group to the top of the chat list:

```php
// Method 1: Array parameter
LetsBot::pinChat()->send([
    'phone' => $phone  // Phone number or group JID
]);

// Method 2: Fluent interface
LetsBot::pinChat()
    ->phone($phone)    // Phone number or group JID
    ->send();
```

### Unpin Chat

Unpin a previously pinned chat or group:

```php
// Method 1: Array parameter
LetsBot::unpinChat()->send([
    'phone' => $phone  // Phone number or group JID
]);

// Method 2: Fluent interface
LetsBot::unpinChat()
    ->phone($phone)    // Phone number or group JID
    ->send();
```

## Notifications

### Mute Chat

Mute notifications for a chat:

```php
// Method 1: Array parameter
LetsBot::muteChat()->send([
    'phone' => $phone,
    'duration' => '60'  // Duration in seconds
]);

// Method 2: Fluent interface
LetsBot::muteChat()
    ->phone($phone)
    ->duration('60')    // Duration in seconds
    ->send();
```

### Unmute Chat

Unmute notifications for a previously muted chat:

```php
// Method 1: Array parameter
LetsBot::unmuteChat()->send([
    'phone' => $phone
]);

// Method 2: Fluent interface
LetsBot::unmuteChat()
    ->phone($phone)
    ->send();
```
