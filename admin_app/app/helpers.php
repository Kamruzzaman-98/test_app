<?php

use App\Models\Setting;

if (! function_exists('currentLanguage')) {

    function currentLanguage()
    {
        return session('locale', config('app.locale'));
    }
}


function setting($key = null, $default = null)
{
    static $settings = null;

    if ($settings === null) {
        $settings = Setting::pluck('value', 'key')->toArray();
    }

    return $settings[$key] ?? $default;
}
