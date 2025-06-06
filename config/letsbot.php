<?php

return [
    /*
    |--------------------------------------------------------------------------
    | LetsBot API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the LetsBot API settings. This configuration
    | is used by the LetsBot API client library to connect to the WhatsApp
    | API provided by LetsBot.
    |
    */

    /**
     * API Key from LetsBot Dashboard
     */
    'api_key' => env('LETS_BOT_API_KEY', ''),

    /**
     * SSL verification
     * Set to false in development environment if you encounter SSL issues
     */
    'ssl_verify' => env('LETS_BOT_SSL_VERIFY', true),
]; 