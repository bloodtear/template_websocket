<?php

namespace app\controller\api\v1;

use \framework\Logging;
use \framework\Cache;
use \framework\Websocket;
use \app\model\MessageModel;

class MessageController {

  public function send_all() {
    echo 'send_all';
    $data = $this->data;
    var_dump($data);

    $message = new MessageModel($data);
    $message = $message->packInfo();

    var_dump($message);

    $ws = WebSocket::inst();
    $ws->push_all(json_encode($message));
  }

  public function send_one() {

    echo 'send_one';
    $data = $this->data;
    var_dump($data);

    $message = new MessageModel($data);
    $message = $message->packInfo();

    Websocket::inst()->push($fd, $message);

  }

  public function send_room() {

    echo 'send_room';
    $data = $this->data;
    var_dump($data);
  }

}





?>
