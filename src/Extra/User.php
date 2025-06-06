<?php
namespace LetsBot\Api\Extra;
trait User {
    protected static $userLinks = [
        'presence'=>[
            'url'=>'user/presence',
            'type'=>'post',
            'params'=>['phone']
        ],
        'block'=>[
            'url'=>'user/block',
            'type'=>'post',
            'params'=>['phone']
        ],
        'unblock'=>[
            'url'=>'user/unblock',
            'type'=>'post',
            'params'=>['phone']
        ],
        'business'=>[
            'url'=>'user/business',
            'type'=>'post',
            'params'=>['phone']
        ],
        'setName'=>[
            'url'=>'user/set/name',
            'type'=>'post',
            'params'=>['phone','name']
        ],
        'userPicture'=>[
            'url'=>'user/display/picture',
            'type'=>'get',
            'params'=>['phone']
        ],
        
         
    ];

    public static function setName(){
        static::$send_type = 'setName';
        return new static;
    }

    public static function business(){
        static::$send_type = 'business';
        return new static;
    }

    public static function unblock(){
        static::$send_type = 'unblock';
        return new static;
    }

    public static function block(){
        static::$send_type = 'block';
        return new static;
    }

    public static function userPicture(){
        static::$send_type = 'userPicture';
        return new static;
    }

    public static function presence(){
        static::$send_type = 'presence';
        return new static;
    }
 
 
}
