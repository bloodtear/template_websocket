<?php

namespace app\model;

class MessageModel {

  public static $instance;
  private $data = null;

  public static function inst($summary) {
    if (empty(self::$instance)) {
      self::$instance = new MessageModel($summary);
    }
    return self::$instance;
  }

  public function __construct($summary){
    $this->data = $summary;
  }

  public function packInfo() {
      $obj = $this->data;

      if (isset($obj->header->token)) {
          $obj->header->token = '';
      }  
    
      return $obj;

  }


}
