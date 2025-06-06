<?php
namespace LetsBot\Api\Extra;
trait QRCodeSession {
    protected static $QrAndSessionLinks = [
        'qr'=>[
            'url'=>'qr',
            'type'=>'post',
            'params'=>[]
        ], 
        'findSession'=>[
            'url'=>'session/find',
            'type'=>'post',
            'params'=>[]
        ], 
        'sessionStatus'=>[
            'url'=>'session/status',
            'type'=>'post',
            'params'=>[]
        ], 
         
    ];

    public static function sessionStatus(){
        static::$send_type = 'sessionStatus';
        return new static;
    }

    public static function findSession(){
        static::$send_type = 'findSession';
        return new static;
    }

    public static function qrCode(){
        static::$send_type = 'qr';
        return new static;
    }
 
}
