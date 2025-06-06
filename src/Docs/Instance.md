# Instance Operations

This documentation covers operations related to managing your WhatsApp instance.

## Instance Status

### Get Status

Retrieve the current status of your WhatsApp instance:

```php
// Get instance status
LetsBot::status()->send();
```

### Set Status Message

Set your WhatsApp status message:

```php
// Method 1: Fluent interface
LetsBot::setStatus()
    ->statusText('Your status message')
    ->send();

// Method 2: Array parameter
LetsBot::setStatus()->send([
    'status' => 'Your status message'
]);
```

## Availability Settings

### Set Online/Offline Status

Control whether your instance appears online:

```php
// Method 1: Array parameter
LetsBot::online()->send([
    'markOnlineOnConnect' => 1  // 1 = online, 0 = offline
]);

// Method 2: Fluent interface
LetsBot::online()
    ->markOnlineOnConnect(1)    // 1 = online, 0 = offline
    ->send();
```

### Set Presence Status

Control your presence status in a specific chat:

```php
// Method 1: Array parameter
LetsBot::setPresence()->send([
    'presence' => 'available',   // Options: unavailable, available, composing, recording, paused
    'mixed' => $targetId         // Phone number or group JID
]);

// Method 2: Fluent interface
LetsBot::setPresence()
    ->presenceType('composing')  // Options: unavailable, available, composing, recording, paused
    ->mixed($targetId)           // Phone number or group JID
    ->send();
```


`