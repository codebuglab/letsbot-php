<?php

if (!function_exists('lb')) {
    /**
     * Helper function to get an instance of LetsBot
     *
     * @return \LetsBot\Api\LetsBot
     */
    function lb()
    {
        return (new \LetsBot\Api\LetsBot);
    }
}
