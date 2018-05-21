<?php



// wss
//defined('WS_APP') or define('WS_APP', "app"); 
//defined('WS_ROOT') or define('WS_ROOT', dirname(__FILE__) . ""); 
//defined('WS_APP') or define('WS_APP', WS_ROOT."/" . WS_APP . "/");

// APP可
defined('APP') or define('APP', 'app');

defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__) . "/../"); 
defined('FRAMEWORK_PATH') or define('FRAMEWORK_PATH', ROOT_PATH.'/framework/');
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH.'/vendor/');
defined('APP_PATH') or define('APP_PATH', ROOT_PATH.'/' . APP . '/');



defined('DOMAIN_URL') or define('DOMAIN_URL', $_SERVER['REQUEST_SCHEME']. '://' . $_SERVER['HTTP_HOST']. "/");
defined('INSTANCE_URL') or define('INSTANCE_URL', basename(dirname(dirname(__FILE__))) . "/" );
defined('ROOT_URL') or define('ROOT_URL', DOMAIN_URL . INSTANCE_URL);
defined('VENDOR_URL') or define('VENDOR_URL', ROOT_URL .'vendor');
defined('APP_URL') or define('APP_URL', ROOT_URL . APP );


defined('WSS_CONFIG') or define('WSS_CONFIG', "/home/xiaoyu/" . APP . "_ws_config.php");
if (file_exists(WSS_CONFIG)) {
  include_once(WSS_CONFIG);
}


