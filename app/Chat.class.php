<?php

class Chat {

  public $data;

  public function send_one_ws($data){
      Websocket::instance()->push($fd, $data);
  }

  public function send_all_ws(){
    Logging::w("SENDALL" , json_encode($this->data));
    $from = $this->data->from;
    $data = $this->data->data;
    $ws = Websocket::instance();
    $array = array(
      "op" => "receive",
      "data" => "$from: $data"
    );
    $ws->push_all(json_encode($array));
  }
}
















?>
