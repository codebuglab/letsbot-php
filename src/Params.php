<?php
namespace LetsBot\Api;

trait Params
{

    public static function audio($audio)
    {
        static::$GUZZLE_PARAMS['audio'] = $audio;
        return new static;
    }

    public static function phone($phone)
    {
        static::$GUZZLE_PARAMS['phone'] = $phone;
        return new static;
    }

    public static function url($url)
    {
        static::$GUZZLE_PARAMS['url'] = $url;
        return new static;
    }

    public static function lat($lat)
    {
        static::$GUZZLE_PARAMS['lat'] = $lat;
        return new static;
    }

    public static function lng($lng)
    {
        static::$GUZZLE_PARAMS['lng'] = $lng;
        return new static;
    }

    public static function caption($caption)
    {
        static::$GUZZLE_PARAMS['caption'] = $caption;
        return new static;
    }

    public static function name($name)
    {
        static::$GUZZLE_PARAMS['name'] = $name;
        return new static;
    }

    public static function description($description)
    {
        static::$GUZZLE_PARAMS['description'] = $description;
        return new static;
    }

    public static function contact($contact)
    {
        static::$GUZZLE_PARAMS['contact'] = $contact;
        return new static;
    }

    public static function body($body)
    {
        static::$GUZZLE_PARAMS['body'] = $body;
        return new static;
    }

    public static function messageId($id)
    {
        static::$GUZZLE_PARAMS['messageId'] = $id;
        return new static;
    }

    public static function id($id)
    {
        static::$GUZZLE_PARAMS['messageID'] = $id;
        return new static;
    }

    public static function reaction($reaction)
    {
        static::$GUZZLE_PARAMS['reaction'] = $reaction;
        return new static;
    }

    public static function mention($mention)
    {
        static::$GUZZLE_PARAMS['mention'] = $mention;
        return new static;
    }

    public static function duration($duration)
    {
        static::$GUZZLE_PARAMS['duration'] = $duration;
        return new static;
    }

    public static function catalog($catalog)
    {
        static::$GUZZLE_PARAMS['catalog'] = $catalog;
        return new static;
    }

    public static function title($title)
    {
        static::$GUZZLE_PARAMS['title'] = $title;
        return new static;
    }

    public static function limit($limit)
    {
        static::$GUZZLE_PARAMS['limit'] = $limit;
        return new static;
    }

    public static function footer($footer)
    {
        static::$GUZZLE_PARAMS['footer'] = $footer;
        return new static;
    }

    public static function buttons(array $buttons)
    {
        static::$GUZZLE_PARAMS['buttons'] = $buttons;
        return new static;
    }

    public static function imageUrl($imageUrl)
    {
        static::$GUZZLE_PARAMS['image'] = $imageUrl;
        return new static;
    }

    public static function videoUrl($videoUrl)
    {
        static::$GUZZLE_PARAMS['video'] = $videoUrl;
        return new static;
    }

    public static function docUrl($documentUrl)
    {
        static::$GUZZLE_PARAMS['document'] = $documentUrl;
        return new static;
    }

    public static function buttonText($buttonText)
    {
        static::$GUZZLE_PARAMS['buttonText'] = $buttonText;
        return new static;
    }

    public static function sections(array $sections)
    {
        static::$GUZZLE_PARAMS['sections'] = $sections;
        return new static;
    }

    public static function subject($subject)
    {
        static::$GUZZLE_PARAMS['subject'] = $subject;
        return new static;
    }

    public static function code($code)
    {
        static::$GUZZLE_PARAMS['code'] = $code;
        return new static;
    }

    public static function phones(array $phones)
    {
        static::$GUZZLE_PARAMS['phones'] = $phones;
        return new static;
    }

    public static function jid($jid)
    {
        static::$GUZZLE_PARAMS['jid'] = $jid;
        return new static;
    }

    public static function to($to)
    {
        static::$GUZZLE_PARAMS['to'] = $to;
        return new static;
    }

    public static function settings($settings)
    {
        static::$GUZZLE_PARAMS['settings'] = $settings;
        return new static;
    }

    public static function cursorId($cursorId)
    {
        static::$GUZZLE_PARAMS['cursorId'] = $cursorId;
        return new static;
    }

    public static function cursorFromMe($cursorFromMe)
    {
        static::$GUZZLE_PARAMS['cursorFromMe'] = $cursorFromMe;
        return new static;
    }
    public static function chat($chat)
    {
        static::$GUZZLE_PARAMS['chat'] = $chat;
        return new static;
    }

    public static function statusText($status)
    {
        static::$GUZZLE_PARAMS['status'] = $status;
        return new static;
    }

    public static function markOnlineOnConnect($markOnlineOnConnect)
    {
        static::$GUZZLE_PARAMS['markOnlineOnConnect'] = $markOnlineOnConnect;
        return new static;
    }

    public static function presenceType($presenceType)
    {
        static::$GUZZLE_PARAMS['presence'] = $presenceType;
        return new static;
    }

    public static function mixed($mixed)
    {
        static::$GUZZLE_PARAMS['mixed'] = $mixed;
        return new static;
    }

    public static function productId($productId)
    {
        static::$GUZZLE_PARAMS['productId'] = $productId;
        return new static;
    }

    public static function images($images)
    {
        static::$GUZZLE_PARAMS['images'] = $images;
        return new static;
    }

    public static function isHidden($isHidden)
    {
        static::$GUZZLE_PARAMS['isHidden'] = $isHidden;
        return new static;
    }

    public static function currency($currency)
    {
        static::$GUZZLE_PARAMS['currency'] = $currency;
        return new static;
    }

    public static function price($price)
    {
        static::$GUZZLE_PARAMS['price'] = $price;
        return new static;
    }

    public static function orderId($orderId)
    {
        static::$GUZZLE_PARAMS['orderId'] = $orderId;
        return new static;
    }

    public static function orderToken($orderToken)
    {
        static::$GUZZLE_PARAMS['orderToken'] = $orderToken;
        return new static;
    }

}
