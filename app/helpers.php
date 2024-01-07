<?php

if (! function_exists('intended')) {
    /**
     * Return URL of intended url or default if provided
     *
     * @param  null  $default
     */
    function intended_url($default = null): mixed
    {
        return session()->pull('url.intended', $default);
    }
}

if (! function_exists('str_same')) {
    function str_same($value_1, $value_2): bool
    {
        return strtolower($value_1) == strtolower($value_2);
    }
}

if (! function_exists('route_is')) {
    /**
     * Return URL of intended url or default if provided
     */
    function route_is($route_name): bool
    {
        return request()->route()->named($route_name);
    }
}

if (! function_exists('active_url')) {
    /**
     * Return 'active' if a current link is active
     */
    function active_url(
        string $route_name,
        string $status = 'show'
    ): string {
        return request()->route()->named($route_name) ? $status : '';
    }
}

if (! function_exists('selected_option')) {
    function selected_option(
        mixed $value,
        mixed $option,
        string $selected = 'selected'
    ): bool|string {
        if ($value == $option) {
            return $selected ?: true;
        } else {
            return $selected ? '' : false;
        }
    }
}
