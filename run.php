<?php
 
// * * * * *
// * config 信息不独立也无所谓，因为这个东西不需要链接到var/www内
// * 考虑到ws的使用情况，不作route处理，当div标签用，哪需要就贴到哪
// * Logging也独立出来，不再调用framework内，直接内部存留一份
// * 
// * * * * *

include_once("framework/Websocket.php");

$ws = \framework\Websocket::inst();
//$ws = Websocket::inst();
$ws->set_up();
$ws->start();


