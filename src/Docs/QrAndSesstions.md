# QR Code and Session Management

This documentation covers QR code generation and session management functions in the LetsBot API. These operations are essential for authenticating and managing your WhatsApp Business API connection.

## QR Code Operations

The QR code is the primary method for authenticating your WhatsApp account with the LetsBot system. When you first connect your account, you'll need to scan a QR code with your WhatsApp application.

### Generate QR Code

Retrieve a QR code for WhatsApp authentication:

```php
// Method 1: Fluent interface
LetsBot::qrCode()->send();

// Method 2: Array parameter (if needed for future parameters)
LetsBot::qrCode()->send([]);
```

**Response Example:**

```json
{
    "success": true,
    "message": "QR code generated successfully",
    "data": {
        "qrcode": "base64_encoded_qr_image_data"
    }
}
```

## Session Management

Once authenticated, you can manage your WhatsApp session using various methods.

### Find Session

Retrieve information about an existing session:

```php
// Method 1: Fluent interface
LetsBot::findSession()->send();

// Method 2: Array parameter (if needed for future parameters)
LetsBot::findSession()->send([]);
```

**Response Example:**

```json
{
    "success": true,
    "message": "Session information retrieved successfully",
    "data": {
        "session_id": "abc123xyz",
        "status": "active",
        "created_at": "2023-06-01T12:00:00Z",
        "last_active": "2023-06-02T08:30:00Z"
    }
}
```

### Check Session Status

Verify the current status of your WhatsApp session:

```php
// Method 1: Fluent interface
LetsBot::sessionStatus()->send();

// Method 2: Array parameter (if needed for future parameters)
LetsBot::sessionStatus()->send([]);
```

**Response Example:**

```json
{
    "success": true,
    "message": "Session is active",
    "data": {
        "status": "active",
        "connected": true,
        "phone": "+1234567890",
        "platform": "android",
        "battery": 85
    }
}
```

### Logout

End your current WhatsApp session:

```php
// Method 1: Fluent interface
LetsBot::logout()->send();

// Method 2: Array parameter (if needed for future parameters)
LetsBot::logout()->send([]);
```

**Response Example:**

```json
{
    "success": true,
    "message": "Successfully logged out",
    "data": {
        "timestamp": "2023-06-02T10:15:00Z"
    }
}
```

## Best Practices

1. **QR Code Handling**: When generating a QR code, display it promptly to the user as it may expire after a short period.

2. **Session Monitoring**: Regularly check session status in your application to ensure continuous connectivity.

3. **Error Handling**: Implement proper error handling for scenarios where sessions might become invalid or disconnect.

4. **Security**: Never share your QR code or session data with unauthorized parties as this could compromise your WhatsApp account access.

For more information about authentication and session management, visit the [LetsBot API Documentation](https://docs.letsbot.net).
