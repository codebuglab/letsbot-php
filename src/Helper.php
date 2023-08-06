<?php

if (!function_exists('lb')) {
    function lb()
    {
        return (new \LetsBot\Api\LetsBot );
    }
}
