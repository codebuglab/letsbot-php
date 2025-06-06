<?php
namespace LetsBot\Api\Extra;

trait Buttons
{
    protected static $buttonLinks = [
        'button' => [
            'url' => 'button',
            'type' => 'post',
            'params' => ['phone', 'body', 'title', 'footer', 'caption', 'buttons'],
        ],
        'image_button' => [
            'url' => 'button/image',
            'type' => 'post',
            'params' => ['phone', 'footer', 'caption', 'buttons', 'image'],
        ],
        'video_button' => [
            'url' => 'button/video',
            'type' => 'post',
            'params' => ['phone', 'footer', 'caption', 'buttons', 'video'],
        ],
        'location_button' => [
            'url' => 'button/location',
            'type' => 'post',
            'params' => ['phone', 'footer', 'caption', 'buttons', 'lat', 'lng'],
        ],
        'document_button' => [
            'url' => 'button/document',
            'type' => 'post',
            'params' => ['phone', 'footer', 'caption', 'buttons', 'video'],
        ],
        // template
        'template_button' => [
            'url' => 'button/template',
            'type' => 'post',
            'params' => ['phone', 'title', 'body', 'footer', 'buttons'],
        ],
        'image_template_button' => [
            'url' => 'button/image/template',
            'type' => 'post',
            'params' => ['phone', 'title', 'body', 'footer', 'buttons', 'image'],
        ],
        'document_template_button' => [
            'url' => 'button/document/template',
            'type' => 'post',
            'params' => ['phone', 'title', 'body', 'footer', 'buttons', 'document'],
        ],
        'video_template_button' => [
            'url' => 'button/video/template',
            'type' => 'post',
            'params' => ['phone', 'title', 'body', 'footer', 'buttons', 'video'],
        ],
        'location_template_button' => [
            'url' => 'button/location/template',
            'type' => 'post',
            'params' => ['phone', 'title', 'body', 'footer', 'buttons', 'lat', 'lng'],
        ],
        // template End
    ];

    public static function button()
    {
        static::$send_type = 'button';
        return new static;
    }

    public static function videoButton()
    {
        static::$send_type = 'video_button';
        return new static;
    }

    public static function locationButton()
    {
        static::$send_type = 'location_button';
        return new static;
    }

    public static function docButton()
    {
        static::$send_type = 'document_button';
        return new static;
    }

    public static function tButton()
    {
        static::$send_type = 'template_button';
        return new static;
    }

    public static function tImageButton()
    {
        static::$send_type = 'image_template_button';
        return new static;
    }

    public static function tDocButton()
    {
        static::$send_type = 'document_template_button';
        return new static;
    }

    public static function tVideoButton()
    {
        static::$send_type = 'video_template_button';
        return new static;
    }
    public static function tLocationButton()
    {
        static::$send_type = 'location_template_button';
        return new static;
    }

}
