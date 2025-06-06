<?php
namespace LetsBot\Api\Extra;
trait Chat {
    protected static $chatLinks = [
        'chatList'=>[
            'url'=>'chat/list',
            'type'=>'get',
            'params'=>[]
        ],
        'contacts'=>[
            'url'=>'contacts',
            'type'=>'get',
            'params'=>[]
        ],
        'getChat'=>[
            'url'=>'chat/conversation',
            'type'=>'get',
            'params'=>['phone','limit','cursorId','cursorFromMe']
        ],
        'typing'=>[
            'url'=>'chat/typing',
            'type'=>'post',
            'params'=>['chat']
        ],
        'recording'=>[
            'url'=>'chat/recording',
            'type'=>'post',
            'params'=>['chat']
        ],
        'readChat'=>[
            'url'=>'chat/read',
            'type'=>'post',
            'params'=>['phone']
        ],
        'unreadChat'=>[
            'url'=>'chat/unread',
            'type'=>'post',
            'params'=>['phone']
        ],
        'archiveChat'=>[
            'url'=>'chat/archive',
            'type'=>'post',
            'params'=>['phone']
        ],
        'unarchiveChat'=>[
            'url'=>'chat/unarchive',
            'type'=>'post',
            'params'=>['phone']
        ],
        'muteChat'=>[
            'url'=>'chat/mute',
            'type'=>'post',
            'params'=>['phone','duration']
        ],
        'unmuteChat'=>[
            'url'=>'chat/unmute',
            'type'=>'post',
            'params'=>['phone']
        ],
         
        'pinChat'=>[
            'url'=>'chat/pin',
            'type'=>'post',
            'params'=>['phone']
        ],
        'unpinChat'=>[
            'url'=>'chat/unpin',
            'type'=>'post',
            'params'=>['phone']
        ],
         
    ];

    public static function unpinChat(){
        static::$send_type = 'unpinChat';
        return new static;
    }

    public static function pinChat(){
        static::$send_type = 'pinChat';
        return new static;
    }

    public static function unmuteChat(){
        static::$send_type = 'unmuteChat';
        return new static;
    }

    public static function muteChat(){
        static::$send_type = 'muteChat';
        return new static;
    }

    public static function unarchiveChat(){
        static::$send_type = 'unarchiveChat';
        return new static;
    }

    public static function archiveChat(){
        static::$send_type = 'archiveChat';
        return new static;
    }

    public static function unreadChat(){
        static::$send_type = 'unreadChat';
        return new static;
    }

    public static function readChat(){
        static::$send_type = 'readChat';
        return new static;
    }

    public static function recording(){
        static::$send_type = 'recording';
        return new static;
    }

    public static function typing(){
        static::$send_type = 'typing';
        return new static;
    }

    public static function contacts(){
        static::$send_type = 'contacts';
        return new static;
    }
    public static function chatList(){
        static::$send_type = 'chatList';
        return new static;
    }

    public static function getChat(){
        static::$send_type = 'getChat';
        return new static;
    }
 
}
