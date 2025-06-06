# Media Messages

This documentation covers how to send different types of media messages using the LetsBot API.

## File Messages

Send a file through WhatsApp:

```php
// Method 1: Array parameter
LetsBot::file()->send([
    'phone' => $phone,
    'url' => $url
]);

// Method 2: Fluent interface
LetsBot::file()
    ->phone($phone)
    ->url($url)
    ->send();
```

## Image Messages

Send an image with optional caption:

```php
// Method 1: Array parameter
LetsBot::image()->send([
    'phone' => $phone,
    'url' => $url,
    'caption' => 'Image caption'
]);

// Method 2: Fluent interface
LetsBot::image()
    ->phone($phone)
    ->url($url)
    ->caption('Image caption')
    ->send();
```

## Video Messages

Send a video with optional caption:

```php
// Method 1: Array parameter
LetsBot::video()->send([
    'phone' => $phone,
    'url' => $url,
    'caption' => 'Video caption'
]);

// Method 2: Fluent interface
LetsBot::video()
    ->phone($phone)
    ->url($url)
    ->caption('Video caption')
    ->send();
```

## Audio Messages

Send an audio message:

```php
// Method 1: Array parameter
LetsBot::sound()->send([
    'phone' => $phone,
    'audio' => $url,
    'caption' => 'Audio caption'
]);

// Method 2: Fluent interface
LetsBot::sound()
    ->phone($phone)
    ->audio($url)
    ->caption('Audio caption')
    ->send();
```

## GIF Messages

Send a GIF animation with optional caption:

```php
// Method 1: Array parameter
LetsBot::gif()->send([
    'phone' => $phone,
    'url' => $url,
    'caption' => 'GIF caption'
]);

// Method 2: Fluent interface
LetsBot::gif()
    ->phone($phone)
    ->url($url)
    ->caption('GIF caption')
    ->send();
```

## Location Messages

Send a location message with coordinates:

```php
// Method 1: Array parameter
LetsBot::location()->send([
    'phone' => $phone,
    'lat' => $latitude,
    'lng' => $longitude
]);

// Method 2: Fluent interface
LetsBot::location()
    ->phone($phone)
    ->lat($latitude)
    ->lng($longitude)
    ->send();
```

## Push-to-Talk (PTT) Messages

Send a voice message:

```php
// Method 1: Array parameter
LetsBot::ptt()->send([
    'phone' => $phone,
    'url' => $url
]);

// Method 2: Fluent interface
LetsBot::ptt()
    ->phone($phone)
    ->url($url)
    ->send();
```

## Contact Messages

Share a contact with the recipient:

```php
// Method 1: Array parameter
LetsBot::contactPhone()->send([
    'phone' => $phone,           // Recipient's phone number
    'contact' => $contactPhone,  // Phone number of the contact to share
    'name' => 'Contact Name',
    'description' => 'Contact description'
]);

// Method 2: Fluent interface
LetsBot::contactPhone()
    ->phone($phone)              // Recipient's phone number
    ->contact($contactPhone)     // Phone number of the contact to share
    ->name('Contact Name')
    ->description('Contact description')
    ->send();
```
