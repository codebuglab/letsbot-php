<?php
namespace LetsBot\Api\Extra;
trait Product {
    protected static $productLinks = [
        'products'=>[
            'url'=>'product',
            'type'=>'post',
            'params'=>['phone']
        ],
        'getProduct'=>[
            'url'=>'product/id',
            'type'=>'get',
            'params'=>['phone','productId']
        ],
        'createProduct'=>[
            'url'=>'product/create',
            'type'=>'post',
            'params'=>['phone','name','description','price','currency','isHidden','images']
        ],
        'getOrder'=>[
            'url'=>'product/get/order',
            'type'=>'post',
            'params'=>['phone','orderId','orderToken']
        ],
         
         
         
    ];

    public static function getOrder(){
        static::$send_type = 'getOrder';
        return new static;
    }

    public static function createProduct(){
        static::$send_type = 'createProduct';
        return new static;
    }

    public static function getProduct(){
        static::$send_type = 'getProduct';
        return new static;
    }

    public static function products(){
        static::$send_type = 'products';
        return new static;
    }
 
 
 
}
