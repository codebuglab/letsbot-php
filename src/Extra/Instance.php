<?php
namespace LetsBot\Api\Extra;
trait Instance {
    protected static $instanceLinks = [
        'status'=>[
            'url'=>'instance/status',
            'type'=>'get',
            'params'=>[]
        ],
        'setStatus'=>[
            'url'=>'instance/set/status',
            'type'=>'post',
            'params'=>['status']
        ],
        'online'=>[
            'url'=>'instance/set/settings',
            'type'=>'post',
            'params'=>['status']
        ],
        'setPresence'=>[
            'url'=>'instance/set/presence',
            'type'=>'post',
            'params'=>['presence','mixed']
        ],
         
         
    ];

    public static function setPresence(){
        static::$send_type = 'setPresence';
        return new static;
    }

    public static function online(){
        static::$send_type = 'online';
        return new static;
    }
 
 
}
