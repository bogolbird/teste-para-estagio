<?php

  namespace app\controller;

  use app\core\Controller;
  use app\model\ModelSorteio;
  use app\classes\Input;

  class SorteioController extends Controller
  {

    private $sorteiomodel;

    public function __construct()
    {
      $this->sorteiomodel = new ModelSorteio();
    }

    public function sorteio()
    {
      $this->sorteiomodel->ezvasiasorteio();
      $par1 = 0;
      $par2 = 0;
      $qntsrt = $this->sorteiomodel->sorteiovalido();
      $total = $qntsrt['total'];
      $menor = $qntsrt['menor'];
      $maior = $qntsrt['maior'];
      if($total == 0){
        echo ('nenhum registro inserido, porfavor insira registros');
      }elseif ( $total % 2 == 1) {
        echo ("número impar, não é possivel sortear");
      }else{
        while(true){
          $par1 = rand($menor, $maior);
          $val1 = $this->sorteiomodel->selectsorteio($par1);
          if($val1 == 0){
            $pessoa = $this->sorteiomodel->pessoaexiste($par1);
            if($pessoa == 1){
              break;
            }
          }
        }
        $primeiro = $par1;
        for ($i=$menor; $i <= $total/2 ; $i++) {
          while(true){
            $par2 = rand($menor, $maior);
            if($par2 != $par1){
              $val2 = $this->sorteiomodel->selectsorteio($par2);
              if($val2 == 0){
                $pessoa = $this->sorteiomodel->pessoaexiste($par2);
                if($pessoa == 1){
                  break;
                }
              }
            }
          }
          $params = array(
            'parum'     => $par1,
            'pardois'   => $par2
          );
          $this->sorteiomodel->insertsorteio($params);
          $par1 = $par2;
        }
        $params = array(
          'parum'     => $par2,
          'pardois'   => $primeiro
        );
        $this->sorteiomodel->insertsorteio($params);
      }
    }

  }
?>
