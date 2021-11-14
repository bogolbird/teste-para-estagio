<?php

  namespace app\controller;

  use app\core\Controller;
  use app\classes\Input;

  class CadastroController extends Controller
  {
    public function novo()
    {
      $this->load('home/cadastro');
    }
  }
?>
