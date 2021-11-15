<?php
  namespace app\controller;
  use app\core\Controller;
  use app\controller\CadastroController;

  class TesteController extends Controller
  {

    public function index(){
      $this->load('home/main');
    }
  }
?>
