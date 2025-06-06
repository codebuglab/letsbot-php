<?php
namespace LetsBot\Api;

use LetsBot\Api\Contracts\ServiceInterface;

class LetsBot
{
    use \LetsBot\Api\Extra\Media;
    use \LetsBot\Api\Extra\Message;
    use \LetsBot\Api\Extra\Buttons;
    use \LetsBot\Api\Extra\ListMessage;
    use \LetsBot\Api\Extra\Groups;
    use \LetsBot\Api\Extra\Chat;
    use \LetsBot\Api\Extra\User;
    use \LetsBot\Api\Extra\Instance;
    use \LetsBot\Api\Extra\Product;
    use \LetsBot\Api\Extra\QRCodeSession;
    use Params, GuzzleMethods;

    public static $api_key;
    public static $domain;
    public static $ssl_verify = true;
    protected static $send_type;

    private static $GUZZLE_URL;
    private static $response;
    private static $GUZZLE_PARAMS = [];

    /**
     * Map of method names to their corresponding service implementations
     *
     * @var array
     */
    protected static $serviceMap = [];

    /**
     * @var LetsBotFacade
     */
    protected static $facade;

    /**
     * Send request with the provided parameters
     *
     * @param array|null $params
     * @return mixed
     */
    public static function send(array $params = null)
    {
        // Support for legacy code
        if (function_exists('\config')) {
            static::$domain = \config('letsbot.domain');
            static::$api_key = \config('letsbot.api_key');
        }

        // If we're already using the new architecture, delegate to it
        if (static::$facade !== null && method_exists(static::$facade, 'send')) {
            return static::$facade->send($params);
        }

        // Legacy code path
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
            // From Trait Chat
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
            // From Trait Product
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

    /**
     * Magic method to route calls to the appropriate implementation
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        return LetsBotFacade::$method(...$args);
    }

    /**
     * Magic method to handle dynamic method calls for instances
     * 
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (method_exists(static::class, $method)) {
            return static::$method(...$args);
        }
        
        // For methods like body(), phone(), etc.
        if (count($args) > 0) {
            static::$GUZZLE_PARAMS[$method] = $args[0];
        }
        
        return $this;
    }
}
