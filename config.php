<?php


include_once("swoole.websocket.php");


defined('WS_APP') or define('WS_APP', "app"); 
defined('WS_ROOT') or define('WS_ROOT', dirname(__FILE__) . ""); 
defined('WS_APP') or define('WS_APP', WS_ROOT."/" . WS_APP . "/");

defined('WS_HOST') or define('WS_HOST', "0.0.0.0");
defined('WS_PORT') or define('WS_PORT', 9501);



?>