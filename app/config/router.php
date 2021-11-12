<?php

  $this->get('/', function(){
    echo 'home!!';
  });

  $this->get('/home', function(){
    echo 'home';
  });

  $this->get('/public', function(){
    (new \app\controller\TesteController)->index();
  });

  $this->get('/categoria', 'TesteController@seta');

?>
