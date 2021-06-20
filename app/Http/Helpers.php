<?php

if (! function_exists('my_asset')) {    
    function my_asset($path, $secure = null)
    {        
        return app('url')->asset('../public/'.$path, $secure);        
    }
}
