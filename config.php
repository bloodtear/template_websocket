<?php



// wss
defined('WS_APP') or define('WS_APP', "app"); 
defined('WS_ROOT') or define('WS_ROOT', dirname(__FILE__) . ""); 
defined('WS_APP') or define('WS_APP', WS_ROOT."/" . WS_APP . "/");


defined('WSS_CONFIG') or define('WSS_CONFIG', "/var/www/" . WS_APP . "_ws_config.php");
if (file_exists(WSS_CONFIG)) {
  include_once(WSS_CONFIG);
}



?>
