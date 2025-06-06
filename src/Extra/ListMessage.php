<?php
namespace LetsBot\Api\Extra;
trait ListMessage {
    protected static $listMessageLinks = [
        'list'=>[
            'url'=>'list/message',
            'type'=>'post',
            'params'=>['phone','title','body','footer','buttonText']
        ],
         
    ];

    public static function list(){
        static::$send_type = 'list';
        return new static;
    }
 
}
