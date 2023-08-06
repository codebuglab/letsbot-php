<?php
namespace LetsBot\Api\Extra;
trait Message {
    protected static $messageLinks = [
        'message'=>[
            'url'=>'message/send',
            'type'=>'post',
            'params'=>['phone','body']
        ],
        'sticker'=>[
            'url'=>'message/send/sticker',
            'type'=>'post',
            'params'=>['phone','url']
        ],
        'reaction'=>[
            'url'=>'message/send/reaction',
            'type'=>'post',
            'params'=>['phone','reaction','messageId']
        ],
        'reply'=>[
            'url'=>'message/send/reply',
            'type'=>'post',
            'params'=>['phone','body','messageId']
        ],
        'mention'=>[
            'url'=>'message/send/mention',
            'type'=>'post',
            'params'=>['phone','mention']
        ],
        'disappearing'=>[
            'url'=>'message/send/disappearing',
            'type'=>'post',
            'params'=>['phone','body','duration']
        ],
        'catalog'=>[
            'url'=>'share/catalog',
            'type'=>'post',
            'params'=>['phone','catalog','title','body','description'],
        ],
        'get'=>[
            'url'=>'message/id',
            'type'=>'get',
            'params'=>['phone','messageID']
        ],
        'fetch'=>[
            'url'=>'message/fetch',
            'type'=>'get',
            'params'=>['limit']
        ],
        'delete'=>[
            'url'=>'message/delete',
            'type'=>'delete',
            'params'=>['phone','messageID']
        ],
    ];

    public static function message(){
        static::$send_type = 'message';
        return new static;
    }

    public static function sticker(){
        static::$send_type = 'sticker';
        return new static;
    }

    public static function react(){
        static::$send_type = 'reaction';
        return new static;
    }

    public static function reply(){
        static::$send_type = 'reply';
        return new static;
    }

    public static function mentions(){
        static::$send_type = 'mention';
        return new static;
    }

    public static function disappearing(){
        static::$send_type = 'disappearing';
        return new static;
    }

    public static function shareCatalog(){
        static::$send_type = 'catalog';
        return new static;
    }


    public static function getMessage(){
        static::$send_type = 'get';
        return new static;
    }

    public static function deleteMessage(){
        static::$send_type = 'delete';
        return new static;
    }

    public static function fetch(){
        static::$send_type = 'fetch';
        return new static;
    }


}
