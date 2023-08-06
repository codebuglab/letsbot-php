<?php
namespace LetsBot\Api;

//use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Request;
trait GuzzleMethods
{
    private static $api_v = '/api/v1/';

    public static function client()
    {
        return new \GuzzleHttp\Client(['base_uri' => static::$domain]);
    }
    public static function get()
    {
        $client = static::client()->request('GET', static::$api_v . static::$GUZZLE_URL
            , [
                'query' => http_build_query(static::$GUZZLE_PARAMS),
                'verify' => static::$ssl_verify,
                //'stream' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . static::$api_key,
                ],
            ]);
        return json_decode($client->getBody()->getContents(), true);
    }

    public static function post()
    {

        $client = static::client()->request('POST', static::$api_v . static::$GUZZLE_URL
            , [
                'json' => static::$GUZZLE_PARAMS,
                'verify' => static::$ssl_verify,
                //'stream' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . static::$api_key,
                ],
            ]);
        return json_decode($client->getBody()->getContents(), true);

    }

    public static function delete()
    {

        $client = static::client()->request('DELETE', static::$api_v . static::$GUZZLE_URL
            , [
                'json' => static::$GUZZLE_PARAMS,
                'verify' => static::$ssl_verify,
                //'stream' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . static::$api_key,
                ],
            ]);
        return json_decode($client->getBody()->getContents(), true);

    }

}
