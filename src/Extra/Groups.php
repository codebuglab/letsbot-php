<?php
namespace LetsBot\Api\Extra;
trait Groups {
    protected static $groupLinks = [
        'createGroup'=>[
            'url'=>'group/create',
            'type'=>'post',
            'params'=>['phones','subject']
        ],
        'joinGroup'=>[
            'url'=>'group/join',
            'type'=>'post',
            'params'=>['code']
        ],
        'generateInvite'=>[
            'url'=>'invite/code',
            'type'=>'post',
            'params'=>['jid']
        ],
        'revoke'=>[
            'url'=>'invite/revoke/code',
            'type'=>'post',
            'params'=>['jid']
        ],
        'send_invite'=>[
            'url'=>'invite/send/link',
            'type'=>'post',
            'params'=>['jid','to']
        ],
        'get_invite_info'=>[
            'url'=>'invite/get/info',
            'type'=>'get',
            'params'=>['code']
        ],
        'demote'=>[
            'url'=>'group/demote/participant',
            'type'=>'post',
            'params'=>['jid','phones']
        ],
        'addParticipant'=>[
            'url'=>'group/add/participant',
            'type'=>'post',
            'params'=>['jid','phones']
        ],
        'removeParticipant'=>[
            'url'=>'group/remove/participant',
            'type'=>'post',
            'params'=>['jid','phones']
        ],
        'promote'=>[
            'url'=>'group/promote/participant',
            'type'=>'post',
            'params'=>['jid','phones']
        ],
        'getPictureGroup'=>[
            'url'=>'group/display/picture',
            'type'=>'get',
            'params'=>['jid']
        ],
        'setPictureGroup'=>[
            'url'=>'group/set/display/picture',
            'type'=>'post',
            'params'=>['jid','image']
        ],
        'renameGroup'=>[
            'url'=>'group/rename',
            'type'=>'post',
            'params'=>['jid','subject']
        ],
        'setGroupDesc'=>[
            'url'=>'group/set/description',
            'type'=>'post',
            'params'=>['jid','description']
        ],
        'groupSetting'=>[
            'url'=>'group/settings',
            'type'=>'post',
            'params'=>['jid','settings'] //announcement, not_announcement, locked, unlocked
        ],
        'groupList'=>[
            'url'=>'group/list',
            'type'=>'get',
            'params'=>[] 
        ],
        'groupChat'=>[
            'url'=>'group/conversation',
            'type'=>'get',
            'params'=>['jid'] 
        ],
        'groupMeta'=>[
            'url'=>'group/meta/data',
            'type'=>'get',
            'params'=>['jid'] 
        ],
         
    ];

    public static function createGroup(){
        static::$send_type = 'createGroup';
        return new static;
    }

    public static function joinGroup(){
        static::$send_type = 'joinGroup';
        return new static;
    }

    public static function generateInvite(){
        static::$send_type = 'generateInvite';
        return new static;
    }

    public static function revoke(){
        static::$send_type = 'revoke';
        return new static;
    }
 
    public static function invite(){
        static::$send_type = 'send_invite';
        return new static;
    }
 
    public static function getInviteInfo(){
        static::$send_type = 'get_invite_info';
        return new static;
    }
    public static function demote(){
        static::$send_type = 'demote';
        return new static;
    }

    public static function addParticipant(){
        static::$send_type = 'addParticipant';
        return new static;
    }

    public static function removeParticipant(){
        static::$send_type = 'removeParticipant';
        return new static;
    }
 
    public static function promote(){
        static::$send_type = 'promote';
        return new static;
    }
 
    public static function getPictureGroup(){
        static::$send_type = 'getPictureGroup';
        return new static;
    }
 
    public static function setPictureGroup(){
        static::$send_type = 'setPictureGroup';
        return new static;
    }
 
    public static function renameGroup(){
        static::$send_type = 'renameGroup';
        return new static;
    }
 
 
    public static function setGroupDesc(){
        static::$send_type = 'setGroupDesc';
        return new static;
    }
 
    public static function groupSetting(){
        static::$send_type = 'groupSetting';
        return new static;
    }
 
    public static function groupList(){
        static::$send_type = 'groupList';
        return new static;
    }
 
    public static function groupChat(){
        static::$send_type = 'groupChat';
        return new static;
    }
 
 
    public static function groupMeta(){
        static::$send_type = 'groupMeta';
        return new static;
    }
 
}
