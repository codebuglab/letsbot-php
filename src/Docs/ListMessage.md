# List Messages

This documentation covers how to send interactive list messages using the LetsBot API. List messages provide a convenient way to present multiple options for users to select from within a WhatsApp conversation.

## Overview

List messages are ideal when you want to:
- Present multiple options in an organized format
- Allow users to select from categorized choices
- Create structured menus for navigation
- Provide a better user experience than plain text options

## Sending List Messages

A list message allows you to send a structured list of items that the recipient can select from:

```php
// Method 1: Fluent interface
LetsBot::list()
    ->phone($phone)
    ->title('Title text')
    ->body('Body text')
    ->footer('Footer text')
    ->buttonText('View list') // Text on the button to view the list
    ->sections($sections)     // Array of sections with list items
    ->send();

// Method 2: Array parameter
LetsBot::list()->send([
    'phone' => $phone,
    'title' => 'Title text',
    'body' => 'Body text',
    'footer' => 'Footer text',
    'buttonText' => 'View list',
    'sections' => $sections,
]);
```

### Required Parameters

- `phone`: Recipient's phone number (including country code without '+')
- `sections`: Array containing sections with row items
- `buttonText`: Text displayed on the button that opens the list

### Optional Parameters

- `title`: Header text for the message (limited to 60 characters)
- `body`: Text content of the message (limited to 1024 characters)
- `footer`: Footer text displayed below the message (limited to 60 characters)

## Sections Format

The `$sections` parameter should be an array with the following structure:

```php
$sections = [
    [
        'title' => 'Section 1',
        'rows' => [
            [
                'id' => 'unique-id-1',
                'title' => 'Item 1',
                'description' => 'Description for item 1'
            ],
            [
                'id' => 'unique-id-2',
                'title' => 'Item 2',
                'description' => 'Description for item 2'
            ]
        ]
    ],
    [
        'title' => 'Section 2',
        'rows' => [
            [
                'id' => 'unique-id-3',
                'title' => 'Item 3',
                'description' => 'Description for item 3'
            ]
        ]
    ]
];
```

### Section Structure Requirements

- Each list message can have up to 10 sections
- Section titles are limited to 24 characters
- Each section can have up to 10 rows/items
- Each row must have a unique `id` within the message
- Row titles are limited to 24 characters
- Row descriptions are optional and limited to 72 characters

## Example Response

When successfully sent, the API will return a response similar to:

```json
{
    "success": true,
    "message": "The message has been successfully sent.",
    "data": {
        "key": {
            "remoteJid": "1234567890@s.whatsapp.net",
            "fromMe": true,
            "id": "BAE5A8F8F8E0278E"
        },
        "message": {
            "listMessage": {
                "title": "Title text",
                "description": "Body text",
                "buttonText": "View list",
                "listType": 1
            }
        },
        "messageTimestamp": "1677650400",
        "status": "SUCCESS"
    }
}
```

## Best Practices

1. **Keep Content Concise**: Users on mobile devices prefer brief, clear options rather than lengthy text.

2. **Logical Grouping**: Organize your list items into sections that make sense, grouping related items together.

3. **Clear Button Text**: Use action-oriented button text that clearly indicates what will happen when pressed.

4. **Descriptive IDs**: Use meaningful IDs for list items to easily identify which option was selected when handling responses.

5. **Error Handling**: Always implement proper error handling for cases where list messages might fail to send.

6. **Response Time**: Be prepared to quickly respond when a user selects an option from your list.

For more information about list messages and interactive elements, visit the [LetsBot API Documentation](https://docs.letsbot.net).
 