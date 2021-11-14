<?php
  namespace app\core;

  class routerCore
  {

      private $uri;
      private $method;

      private $getArr = [];

      public function __construct()
      {
        $this->initalize();
        require_once('../app/config/router.php');
        $this->execute();
      }

      private function initalize()
      {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $ex = explode('/', $uri);
        $uri = $this->normalizeURI($ex);

        for($x = 0; $x < UNSET_URI_COUNT; $x++){
          unset($uri[$x]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));
        if(DEBUG_URI)
          dd($this->uri);
      }

      private function get($router, $call)
      {
        $this->getArr[] = [
          'router' => $router,
          'call' => $call
        ];
      }

      private function execute()
      {
        switch ($this->method){
          case 'GET':
            $this->executeGet();
            break;
          case 'POST':

            break;
        }
      }

      private function executeGet()
      {
        foreach ($this->getArr as $get) {
          $r = substr($get['router'],1);

          if(substr($r, -1) == '/'){
            $r = substr($r, 0, -1);
          }
          if($r == $this->uri){
            if(is_callable($get['call'])){
              $get['call']();
              break;
            }else{
              $this->executeController($get['call']);
            }
          }
        }
      }

      private function executeController($get)
      {
        $ex = explode('@', $get);
      }

      private function normalizeURI($arr)
      {
        return array_values(array_filter($arr));
      }
  }
?>
