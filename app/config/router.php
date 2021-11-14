<?php

  $this->get('/', function(){
    (new \app\controller\TesteController)->index();
  });

  $this->get('/cadastro', function(){
    (new \app\controller\CadastroController)->novo();
  });

  //$this->post('/insert', 'CadastroController@cadastro');

?>
