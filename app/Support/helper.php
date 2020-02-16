<?php

if(!function_exists('site')) {
    function site($key = null)
    {
        $data = \App\SiteSetting::first();
        $key = 'site_' . $key;

        return $key ? $data[$key] : $data;
    }
}
