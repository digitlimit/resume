<?php

if(!function_exists('intended'))
{
    /**
     * Return URL of intended url or default if provided
     *
     * @param null $default
     * @return mixed
     */
    function intended_url($default=null)
    {
        return session()->pull('url.intended', $default);
    }
}

if(!function_exists('str_same'))
{

    function str_same($value_1, $value_2)
    {
        return strtolower($value_1) == strtolower($value_2);
    }
}


if(!function_exists('route_is'))
{
    /**
     * Return URL of intended url or default if provided
     *
     * @param $route_name
     * @return mixed
     */
    function route_is($route_name)
    {
        return request()->route()->named($route_name);
    }
}


if(!function_exists('active_url'))
{
    /**
     * Return 'active' if current link is active
     *
     * @param $route_name
     * @param $status
     * @return mixed
     */
    function active_url($route_name, $status='show')
    {
        return request()->route()->named($route_name) ? $status : '';
    }
}