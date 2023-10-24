<?php
namespace LetsBot\Api\Extra;
trait Media {
    protected static $mediaLinks = [
        'file'=>[
            'url'=>'send/file',
            'type'=>'post',
            'params'=>['phone','url']
        ],
        'image'=>[
            'url'=>'send/image',
            'type'=>'post',
            'params'=>['phone','url','caption']
        ],
        'video'=>[
            'url'=>'send/video',
            'type'=>'post',
            'params'=>['phone','url','caption']
        ],
        'gif'=>[
            'url'=>'send/gif',
            'type'=>'post',
            'params'=>['phone','url','caption']
        ],
        'audio'=>[
            'url'=>'send/audio',
            'type'=>'post',
            'params'=>['phone','audio','caption']
        ],
        'location'=>[
            'url'=>'send/location',
            'type'=>'post',
            'params'=>['phone','lat','lng']
        ],
        'ptt'=>[
            'url'=>'send/ptt',
            'type'=>'post',
            'params'=>['phone','url']
        ],
        'contact'=>[
            'url'=>'send/contact',
            'type'=>'post',
            'params'=>['phone','contact','name','description']
        ],
    ];

    public static function file(){
        static::$send_type = 'file';
        return new static;
    }

    public static function image(){
        static::$send_type = 'image';
        return new static;
    }

    public static function video(){
        static::$send_type = 'video';
        return new static;
    }

    public static function sound(){
        static::$send_type = 'audio';
        return new static;
    }

    public static function gif(){
        static::$send_type = 'gif';
        return new static;
    }

    public static function location(){
        static::$send_type = 'location';
        return new static;
    }

    public static function contactPhone(){
        static::$send_type = 'contact';
        return new static;
    }

    public static function ptt(){
        static::$send_type = 'ptt';
        return new static;
    }

}
