<?php /* 301 Permanent Redirect Rules */

//  /bfx --> http://legacy.brutalistframework.com/bfx
if (isset($_SERVER['REQUEST_URI']) && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/bfx'){header('Location: http://legacy.brutalistframework.com/bfx',true,301);exit();}
?>