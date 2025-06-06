# User Operations

This documentation covers all user-related operations available in the LetsBot API.

## User Presence

Check if a user exists on WhatsApp:

```php
// Method 1: Array parameter
LetsBot::presence()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::presence()
    ->phone($phone)
    ->send();
```

## User Profile

### Get User Profile Picture

Retrieve a user's profile picture:

```php
// Method 1: Array parameter
LetsBot::userPicture()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::userPicture()
    ->phone($phone)
    ->send();
```

### Set Profile Name

Change your WhatsApp profile name:

```php
// Method 1: Array parameter
LetsBot::setName()->send([
    'phone' => $phone,
    'name' => 'Profile Name'
]);

// Method 2: Fluent interface
LetsBot::setName()
    ->phone($phone)
    ->name('Profile Name')
    ->send();
```

## User Management

### Block User

Block a user on WhatsApp:

```php
// Method 1: Array parameter
LetsBot::block()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::block()
    ->phone($phone)
    ->send();
```

### Unblock User

Unblock a previously blocked user:

```php
// Method 1: Array parameter
LetsBot::unblock()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::unblock()
    ->phone($phone)
    ->send();
```

## Business Profile

Get business profile information for a user:

```php
// Method 1: Array parameter
LetsBot::business()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::business()
    ->phone($phone)
    ->send();
```
