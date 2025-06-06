# Group Operations

This documentation covers operations related to WhatsApp groups using the LetsBot API.

## Creating and Joining Groups

### Create Group

Create a new WhatsApp group:

```php
// Method 1: Fluent interface
LetsBot::createGroup()
    ->phones($phones)           // Array of participant phone numbers
    ->subject('Group Subject')
    ->send();

// Method 2: Array parameter
LetsBot::createGroup()->send([
    'phones' => $phones,        // Array of participant phone numbers
    'subject' => 'Group Subject'
]);
```

### Join Group

Join a WhatsApp group using an invite code:

```php
// Method 1: Fluent interface
LetsBot::joinGroup()
    ->code('LodMQDI1Vac31mZsfAOfsL')
    ->send();

// Method 2: Array parameter
LetsBot::joinGroup()->send([
    'code' => 'LodMQDI1Vac31mZsfAOfsL'
]);
```

## Group Invitations

### Generate Invite Code

Generate an invite code for a group:

```php
// Method 1: Array parameter
LetsBot::generateInvite()->send([
    'jid' => '120363060196410620@g.us'
]);

// Method 2: Fluent interface
LetsBot::generateInvite()
    ->jid('120363060196410620@g.us')
    ->send();
```

### Revoke Invite Code

Revoke an existing invite code for a group:

```php
// Method 1: Array parameter
LetsBot::revoke()->send([
    'jid' => '120363060196410620@g.us'
]);

// Method 2: Fluent interface
LetsBot::revoke()
    ->jid('120363060196410620@g.us')
    ->send();
```

### Send Invitation

Send an invitation to join a group:

```php
// Method 1: Array parameter
LetsBot::invite()->send([
    'jid' => '120363060196410620@g.us',
    'to' => $phone
]);

// Method 2: Fluent interface
LetsBot::invite()
    ->jid('120363060196410620@g.us')
    ->to($phone)
    ->send();
```

### Get Invitation Info

Get information about a group from its invite code:

```php
// Method 1: Fluent interface
LetsBot::getInviteInfo()
    ->code('LodMQDI1Vac31mZsfAOfsL')
    ->send();

// Method 2: Array parameter
LetsBot::getInviteInfo()->send([
    'code' => 'LodMQDI1Vac31mZsfAOfsL'
]);
```

## Participant Management

### Add Participants

Add participants to a group:

```php
// Method 1: Array parameter
LetsBot::addParticipant()->send([
    'jid' => '120363060196410620@g.us',
    'phones' => $phones      // Array of phone numbers
]);

// Method 2: Fluent interface
LetsBot::addParticipant()
    ->jid('120363060196410620@g.us')
    ->phones($phones)       // Array of phone numbers
    ->send();
```

### Remove Participants

Remove participants from a group:

```php
// Method 1: Array parameter
LetsBot::removeParticipant()->send([
    'jid' => '120363060196410620@g.us',
    'phones' => $phones      // Array of phone numbers
]);

// Method 2: Fluent interface
LetsBot::removeParticipant()
    ->jid('120363060196410620@g.us')
    ->phones($phones)       // Array of phone numbers
    ->send();
```

### Promote Participants to Admins

Promote participants to group administrators:

```php
// Method 1: Array parameter
LetsBot::promote()->send([
    'jid' => '120363060196410620@g.us',
    'phones' => $phones      // Array of phone numbers
]);

// Method 2: Fluent interface
LetsBot::promote()
    ->jid('120363060196410620@g.us')
    ->phones($phones)       // Array of phone numbers
    ->send();
```

### Demote Admins to Participants

Demote administrators to regular participants:

```php
// Method 1: Array parameter
LetsBot::demote()->send([
    'jid' => '120363060196410620@g.us',
    'phones' => $phones      // Array of phone numbers
]);

// Method 2: Fluent interface
LetsBot::demote()
    ->jid('120363060196410620@g.us')
    ->phones($phones)       // Array of phone numbers
    ->send();
```

## Group Settings

### Rename Group

Change a group's subject/name:

```php
// Method 1: Array parameter
LetsBot::renameGroup()->send([
    'jid' => '120363072846036056@g.us',
    'subject' => 'New Group Name'
]);

// Method 2: Fluent interface
LetsBot::renameGroup()
    ->jid('120363072846036056@g.us')
    ->subject('New Group Name')
    ->send();
```

### Set Group Description

Change a group's description:

```php
// Method 1: Array parameter
LetsBot::setGroupDesc()->send([
    'jid' => '120363072846036056@g.us',
    'description' => 'New group description'
]);

// Method 2: Fluent interface
LetsBot::setGroupDesc()
    ->jid('120363072846036056@g.us')
    ->description('New group description')
    ->send();
```

### Change Group Settings

Change group settings:

```php
// Method 1: Array parameter
LetsBot::groupSetting()->send([
    'jid' => '120363072846036056@g.us',
    'settings' => 'announcement'  // Options: announcement, not_announcement, locked, unlocked
]);

// Method 2: Fluent interface
LetsBot::groupSetting()
    ->jid('120363072846036056@g.us')
    ->settings('announcement')   // Options: announcement, not_announcement, locked, unlocked
    ->send();
```

## Group Profile

### Get Group Picture

Get a group's profile picture:

```php
// Method 1: Array parameter
LetsBot::getPictureGroup()->send([
    'jid' => '120363072846036056@g.us'
]);

// Method 2: Fluent interface
LetsBot::getPictureGroup()
    ->jid('120363072846036056@g.us')
    ->send();
```

### Set Group Picture

Set a group's profile picture:

```php
// Method 1: Array parameter
LetsBot::setPictureGroup()->send([
    'jid' => '120363072846036056@g.us',
    'image' => $imageUrl
]);

// Method 2: Fluent interface
LetsBot::setPictureGroup()
    ->jid('120363072846036056@g.us')
    ->imageUrl($imageUrl)
    ->send();
```

## Group Information

### Get Group List

Get a list of all groups:

```php
// Get all groups
LetsBot::groupList()->send();
```

### Get Group Conversation

Get messages from a group:

```php
// Method 1: Array parameter
LetsBot::groupChat()->send([
    'jid' => '120363072846036056@g.us'
]);

// Method 2: Fluent interface
LetsBot::groupChat()
    ->jid('120363072846036056@g.us')
    ->send();
```

### Get Group Metadata

Get detailed information about a group:

```php
// Method 1: Array parameter
LetsBot::groupMeta()->send([
    'jid' => '120363072846036056@g.us'
]);

// Method 2: Fluent interface
LetsBot::groupMeta()
    ->jid('120363072846036056@g.us')
    ->send();
```
 