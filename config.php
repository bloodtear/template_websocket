<?php



// wss
defined('WS_APP') or define('WS_APP', "app"); 
defined('WS_ROOT') or define('WS_ROOT', dirname(__FILE__) . ""); 
defined('WS_APP') or define('WS_APP', WS_ROOT."/" . WS_APP . "/");

defined('WS_HOST') or define('WS_HOST', "0.0.0.0");
defined('WS_PORT') or define('WS_PORT', 9501);

// redis
// defined('REDIS_HOST') or define('REDIS_HOST', '127.0.0.1');
defined('REDIS_HOST') or define('REDIS_HOST', '180.76.160.113');
defined('REDIS_PORT') or define('REDIS_PORT', '6379');
defined('REDIS_PWD') or define('REDIS_PWD', 'xiaoyu');

include_once("swoole.websocket.php");

?>
