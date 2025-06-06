# Button Messages

This documentation covers how to send different types of button messages using the LetsBot API.

## Standard Button Messages

Send a text message with interactive buttons:

```php
// Method 1: Fluent interface
LetsBot::button()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->caption('Caption text')
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::button()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'buttons' => $buttons,
]);
```

## Media Button Messages

### Image Button Message

Send an image with interactive buttons:

```php
// Method 1: Fluent interface
LetsBot::imageButton()
    ->phone($phone)
    ->footer('Footer text')
    ->caption('Caption text')
    ->buttons($buttons)
    ->imageUrl('https://example.com/image.png')
    ->send();

// Method 2: Array parameter
LetsBot::imageButton()->send([
    'phone' => $phone,
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'image' => 'https://example.com/image.png',
    'buttons' => $buttons,
]);
```

### Video Button Message

Send a video with interactive buttons:

```php
// Method 1: Fluent interface
LetsBot::videoButton()
    ->phone($phone)
    ->footer('Footer text')
    ->caption('Caption text')
    ->buttons($buttons)
    ->videoUrl('https://example.com/video.mp4')
    ->send();

// Method 2: Array parameter
LetsBot::videoButton()->send([
    'phone' => $phone,
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'video' => 'https://example.com/video.mp4',
    'buttons' => $buttons,
]);
```

### Location Button Message

Send a location with interactive buttons:

```php
// Method 1: Fluent interface
LetsBot::locationButton()
    ->phone($phone)
    ->footer('Footer text')
    ->caption('Caption text')
    ->lat('21.4858')
    ->lng('39.1925')
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::locationButton()->send([
    'phone' => $phone,
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'lat' => '21.4858',
    'lng' => '39.1925',
    'buttons' => $buttons,
]);
```

### Document Button Message

Send a document with interactive buttons:

```php
// Method 1: Fluent interface
LetsBot::docButton()
    ->phone($phone)
    ->footer('Footer text')
    ->caption('Caption text')
    ->docUrl($url)
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::docButton()->send([
    'phone' => $phone,
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'document' => $url,
    'buttons' => $buttons,
]);
```

## Template Button Messages

### Text Template Button

Send a template message with buttons:

```php
// Method 1: Fluent interface
LetsBot::tButton()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->caption('Caption text')
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::tButton()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'caption' => 'Caption text',
    'buttons' => $buttons,
]);
```

### Image Template Button

Send a template message with an image and buttons:

```php
// Method 1: Fluent interface
LetsBot::tImageButton()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->imageUrl($url)
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::tImageButton()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'image' => $url,
    'buttons' => $buttons,
]);
```

### Document Template Button

Send a template message with a document and buttons:

```php
// Method 1: Fluent interface
LetsBot::tDocButton()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->docUrl($url)
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::tDocButton()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'document' => $url,
    'buttons' => $buttons,
]);
```

### Video Template Button

Send a template message with a video and buttons:

```php
// Method 1: Fluent interface
LetsBot::tVideoButton()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->videoUrl($url)
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::tVideoButton()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'video' => $url,
    'buttons' => $buttons,
]);
```

### Location Template Button

Send a template message with a location and buttons:

```php
// Method 1: Fluent interface
LetsBot::tLocationButton()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->lat($lat)
    ->lng($lng)
    ->buttons($buttons)
    ->send();

// Method 2: Array parameter
LetsBot::tLocationButton()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'lat' => $lat,
    'lng' => $lng,
    'buttons' => $buttons,
]);
```

## Button Format

The `$buttons` parameter should be an array of button objects:

```php
$buttons = [
    [
        'id' => 'button1',
        'text' => 'Button 1'
    ],
    [
        'id' => 'button2',
        'text' => 'Button 2'
    ],
    // Add more buttons as needed
];
```