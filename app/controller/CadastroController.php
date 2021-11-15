<?php

  namespace app\controller;

  use app\core\Controller;
  use app\model\ModelCadastro;
  use app\classes\Input;

  class CadastroController extends Controller
  {

    private $cadastromodel;

    public function __construct()
    {
      $this->cadastromodel = new ModelCadastro();
    }

    public function novo()
    {
      $this->load('home/cadastro');
    }

    public function cadastro()
    {
      $input = $this->getInput();

      $result = $this->cadastromodel->insert($input);
    }

    private function getInput()
    {

      return (object)[
        'nome'      => Input::post('nome'),
        'email'     => Input::post('email')
      ];
    }

    public function select()
    {
      $listapessoas = $this->cadastromodel->getAll();
      return $this->load('home/main', $listapessoas);
    }

    public function pesquisa()
    {
      $param = Input::get('pes');
      $countpes = $this->cadastromodel->countpes();
      $pes = $this->cadastromodel->selectpes($param);
      if($pes != null){
      $decom1 = $pes[0];
      $id = $decom1['id'];
      $nome = $decom1['nome'];
      $email = $decom1['email'];
      $this->load('home/pesquisa',[
        'termo' => 'Exibindo resultado para: ' . $param,
        'id'    => 'Exibindo ID: ' . $id,
        'nome'  => 'Exibindo Nome: ' . $nome,
        'email' => 'Exibindo Email: ' . $email
      ]);
      }else{
        $this->load('home/pesquisa',[
          'termo' => 'Exibindo resultado para: ' . $param,
          'erro' => 'ERROR: O valor pesquisado não foi cadastrado'
        ]);
      }
    }

  }
?>
