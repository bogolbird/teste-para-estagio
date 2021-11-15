<?php

  namespace app\model;

  use app\core\Model;
  use app\classes\Input;
  class ModelCadastro
  {

    private $pdo;
    private $con;
    private $res;
    private $sql;
    public $listapessoas;

    public function __construct()
    {
      $this->pdo = new Model();
    }

    public function insert($params)
    {
      $con = $this->pdo->conexao();
      $sql = 'INSERT INTO lista_pessoas (nome, email) VALUES (:nome, :email)';
      $params = [
            ':nome'      => $params->nome,
            ':email'     => $params->email
      ];
      if (!filter_var($params[':email'], FILTER_VALIDATE_EMAIL)) {
        echo('email invalido');
      }else{
        if (!$this->pdo->executeNonQuery($sql, $params)){
          return -1;
        }else{
          print_r('inserido com sucesso');
        }
      }
    }

    public function getAll()
    {
      $sql = 'SELECT nome, email FROM lista_pessoas ORDER BY nome ASC';

      $all = $this->pdo->executeQuery($sql);

      $this->listapessoas = null;

      foreach ($all as $one)
          $this->listapessoas[] = $this->collection($one);

      return $this->listapessoas;
    }

    private function collection($param)
    {
      return (object)[
        'nome'  => $param['nome']  ?? null,
        'email' => $param['email'] ?? null
      ];
    }

    public function selectpes($param)
    {
      $sql = "SELECT * FROM lista_pessoas where nome = '{$param}' or email = '{$param}'";

      $pes = $this->pdo->executeQuery($sql);

      return $pes;
    }

    public function countpes()
    {
      $sql = "SELECT count(*) as total FROM lista_pessoas";
      $slcsrt = $this->pdo->executeQuery($sql);
      $decom1 = $slcsrt[0];
      $decom2 = $decom1['total'];
      return $decom2;
    }

  }
?>
