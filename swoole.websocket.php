<?php

// 封装swoole原生的websocket
class Websocket {
  private $server;
  public static $instance;

  public static function instance() {
    if (empty(self::$instance)) {
      self::$instance = new Websocket();
    }
    return self::$instance;
  }

  public function __construct() {
    $this->server = new swoole_websocket_server(WS_HOST, WS_PORT);
  }

  public function set_up() {

    $this->set_open();
    $this->set_close();
    $this->set_process();

  }

  // 有用户接入
  private function set_open() {
    $this->server->on('open', function (swoole_websocket_server $server, $request) {
      $s = $request->server;
      echo "server: handshake success with fd{$request->fd}\n";
      Logging::w("OPEN", "server: new user linked [fd :{$request->fd}] [remote ip : {$s['remote_addr']}] [remote port : {$s['remote_port']}]");
    });
  }

  // 设置关闭处理
  private function set_close() {
    $this->server->on('close', function ($ser, $fd) {
      echo "client {$fd} closed\n";
    });
  }

  // 收到信息的处理
  private function set_process() {
    $this->server->on('message', function (swoole_websocket_server $server, $frame) {
      $data = $frame->data;
      $data = json_decode($data);
      $action = $data->action;
      $data = $data->data;

      list($path, $controller, $action) = $this->parse($action);
      $file = WS_APP . "/" . rtrim("/", $path) . $controller . ".class.php";
      
      Logging::w("PROCESS", "$path // $controller // $action");
      Logging::w("PROCESS", "$file");

      if (!file_exists($file)) {
        die("ws app file not exists.");
      }
      
      include_once($file);
          
      try {
        $class = new ReflectionClass($controller);  // 获取类
        $instance = $class->newInstance();          // 获取实例
        $func = $class->getMethod($action);         // 获取函数名

        $instance->data = $data;

        if (!$func->isStatic() && $func->isPublic()) {
          $result = $func->invoke($instance);
          if (!empty($result)){
            echo json_encode($result);
          }
        }


      }catch(Exception $e) {
        record_error($e);
      }


    });
  }

  public function push_one($fd, $data) {
    $this->server->push($d, $data);
  }

  public function push_all($data) {
    foreach ($this->server->connections as $fd) {
        $this->server->push($fd, $data);
    }
  }


  private function parse($action) {
    $a = explode(".", $action);
    $l = count($a);

    if (empty($action) || $l < 2) {
      die("websocket parse failed.");
      return false;
    }

    $function = $a[$l - 1];
    $class = $a[$l - 2];

    unset($a[$l - 1]);
    unset($a[$l - 2]);

    $path = implode("/", $a);

    return array($path, ucfirst($class), $function . "_ws");
    
  }



  public function start(){
    $this->server->start();
  }
}



?>
