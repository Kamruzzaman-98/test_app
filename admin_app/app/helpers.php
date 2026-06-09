<?php

if (! function_exists('currentLanguage')) {

    function currentLanguage()
    {
        return session('locale', config('app.locale'));
    }
}
