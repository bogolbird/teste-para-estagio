<?php

  $this->get('/', function(){
    (new \app\controller\CadastroController)->select();
  });

  $this->get('/cadastro', function(){
    (new \app\controller\CadastroController)->novo();
  });

  $this->post('/insert', function(){
    (new \app\controller\CadastroController)->cadastro();
  });

  $this->get('/pesquisa', function(){
    (new \app\controller\CadastroController)->pesquisa();
  });

  $this->get('/sorteio', function(){
    (new \app\controller\SorteioController)->sorteio();
  });

?>
