# LetsBot Api Package

the package can provide all you need to use Lets Bot api according the [LetsBot Api Document](https://docs.letsbot.net)

if you are using laravel you should install it using composer

```
composer require letsbot/php-package
```

after install it you should publish the config file to set your integration values

```
php artisan vendor:publish --tag=letsbot-config
```

you can find the config file in `config/letsbot.php`

```
return [
 'api_key'=>env('LETS_BOT_API_KEY','test'),
 'ssl_verify'=>true,
];
```

`api_key` to set api key generated from your dashboard

`ssl_verify` this option can disable the ssl CERT PEM if you are using the package under development in your project must be change it to `false` to skip errors

if you are using php native or php OOP and you need to use our package ?

no problem this is easy just you have set your integrate your data as well


in this package we are provide alias `LetsBot\Api\LetsBot::class` you don't need do anything else..

you just need to use the `use LetsBot;` class in your object

and we provide a helper function `lb` nested the `LetsBot` class

example:-

```
require 'vendor/autoload.php';
$lb = (new \LetsBot\Api\LetsBot);
$lb::$api_key = 'test'; // set api key
$lb::$ssl_verify = false; // set ssl optional | true or false . default is true


// $lb = new LetsBot\Api\LetsBot;
$result = $lb->ChatList()->send();
echo json_encode($result);
```

# usage

in this package we are provide  alias `LetsBot\Api\LetsBot::class` you don't need do anything else..

you just need to use the `use LetsBot;` class in your object

and we provide a helper function `lb` nested the `LetsBot` class

example:-

```
return LetsBot::sessionStatus()->send();
// OR
return lb()->sessionStatus()->send();
```

this is list of methods are ready to use

# Message

## Send Text Message
```
LetsBot::message()->phone($phone)->body('Hi')->send();
```

- OR

```
LetsBot::message()->send(['phone'=>$phone,'body'=>'Hi']);
```


## Send Sticker Message

```
LetsBot::sticker()->send(['phone'=>$phone,'url'=>$url]);
```

- OR

```
LetsBot::sticker()->phone($phone)->url($url)->send();
```


## Send Reaction Message
```
LetsBot::react()->phone($phone)->reaction('❤️')->messageId('BAE5A8F8F8E0278E')->send();
```

- OR

```
LetsBot::react()->send(['phone'=>$phone,'reaction'=>'❤️','messageId'=>'BAE5A8F8F8E0278E']);
```


## Send Replay Message

```
LetsBot::reply()->phone($phone)->body('replay msg')->messageId('BAE5A8F8F8E0278E')->send();
```

- OR

```
 LetsBot::reply()->send([
    'phone'=>$phone,
    'body'=>'replay msg',
    'messageId'=>'BAE5A8F8F8E0278E'
]);
```

## Mention Someone

```
LetsBot::mentions()->phone($phone)->mention($phone2)->send();
```

- OR

```
LetsBot::mentions()->send(['phone'=>$phone2,'mention'=>$phone]);
```

## Send disappearing message

```
LetsBot::disappearing()->phone($phone)->duration(60)->body('This is a disappearing message')->send();
```

- OR

```
LetsBot::disappearing()->send([
    'phone'=>$phone,
    'duration'=>60, //(Optional)Message disappear after duration time in seconds. Default (7 days)
    'body'=>'This is a disappearing message that will disappear after X duration',
]);
```

## Send Catalog Message

```
LetsBot::shareCatalog()->phone($phone)->catalog($phone2)
->title('This is title of catalog')
->description('This is description of catalog')
->body('This is body of catalog')->send();
```

- OR

```
LetsBot::shareCatalog()->send([
    'phone'=>$phone,
    'catalog'=>$phone2,
    'title'=>'This is title of catalog',
    'description'=>'This is description of catalog',
    'body'=>'This is body of catalog',
]);
```

# Buttons

# Chat

# Groups

# Instance

# List Message

# Media (send attachment files or other)

# User

# Products

# Check the QR Code OR Session status
