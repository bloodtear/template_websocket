<?php


include_once("config.php");

include_once("../framework/config.php");




$ws = Websocket::instance();
$ws->set_up();
$ws->start();



?>
