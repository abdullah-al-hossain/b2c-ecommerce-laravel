<?php


if (! function_exists('my_asset')) {    
    function my_asset($path, $secure = null)
    {        
        return app('url')->asset('/public/'.$path, $secure);        
    }
}

if (! function_exists('bn2en')) {    
    function bn2en($number)
    {        
        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        return str_replace($bn, $en, $number);      
    }
}

if (! function_exists('en2bn')) {    
    function en2bn($number)
    {        
        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        return str_replace($en, $bn, $number);
    }
}
