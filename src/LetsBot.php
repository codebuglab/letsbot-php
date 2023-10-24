<?php
namespace LetsBot\Api;

class LetsBot
{
    use \LetsBot\Api\Extra\Media;
    use \LetsBot\Api\Extra\Message;
    // use \LetsBot\Api\Extra\Buttons;
    // use \LetsBot\Api\Extra\ListMessage;
    // use \LetsBot\Api\Extra\Groups;
    // use \LetsBot\Api\Extra\Chat;
    // use \LetsBot\Api\Extra\User;
    // use \LetsBot\Api\Extra\Instance;
    // use \LetsBot\Api\Extra\Product;
    // use \LetsBot\Api\Extra\QRCodeSession;
    use Params, GuzzleMethods;

    public static $api_key;
    public static $domain;
    public static $ssl_verify = true;
    protected static $send_type;

    private static $GUZZLE_URL;
    private static $response;
    private static $GUZZLE_PARAMS = [];

    public static function send(array $params = null)
    {
        if (function_exists('config')) {
            static::$domain = config('letsbot.domain');
            static::$api_key = config('letsbot.api_key');
        }

        // If Send Param Not Empty
        if (!empty($params) && count($params) > 0) {
            static::$GUZZLE_PARAMS = $params;
        }

        // Get By Trait Links Group
        if (!empty(static::$mediaLinks[static::$send_type])) {
            // From trait Media
            $data = static::$mediaLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$messageLinks[static::$send_type])) {
            // From Trait Message
            $data = static::$messageLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$buttonLinks[static::$send_type])) {
            // From Trait Button
            $data = static::$buttonLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$listMessageLinks[static::$send_type])) {
            // From Trait ListMessage
            $data = static::$listMessageLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$groupLinks[static::$send_type])) {
            // From Trait Groups
            $data = static::$groupLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$chatLinks[static::$send_type])) {
            // From Trait Groups
            $data = static::$chatLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$userLinks[static::$send_type])) {
            // From Trait User
            $data = static::$userLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$instanceLinks[static::$send_type])) {
            // From Trait Instance
            $data = static::$instanceLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$productLinks[static::$send_type])) {
            // From Trait Instance
            $data = static::$productLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        } elseif (!empty(static::$QrAndSessionLinks[static::$send_type])) {
            // From Trait QRCode
            $data = static::$QrAndSessionLinks[static::$send_type];
            static::$GUZZLE_URL = $data['url'];
        }

        // Check Data
        if (!empty($data)) {
            if ($data['type'] == 'post') {
                return static::post();
            } elseif ($data['type'] == 'get') {
                return static::get();
            } elseif ($data['type'] == 'delete') {
                return static::delete();
            }
        }
        return new static;
    }

}
