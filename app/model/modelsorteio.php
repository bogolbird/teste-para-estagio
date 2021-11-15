<?php

  namespace app\model;

  use app\core\Model;
  use app\classes\Input;
  class ModelSorteio
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

    public function sorteiovalido()
    {
      $sql = "SELECT count(*) as total, min(id) as menor, max(id) as maior FROM lista_pessoas";
      $slcsrt = $this->pdo->executeQuery($sql);
      $decom = $slcsrt[0];
      return $decom;
    }

    public function selectsorteio($params)
    {
      $sql = "SELECT count(*) as result FROM sorteio where parum = {$params} or pardois = {$params}";
      $slcsrt = $this->pdo->executeQuery($sql);
      $decom = $slcsrt[0];
      $result = $decom['result'];
      return $result;
    }

    public function insertsorteio($params)
    {
      $con = $this->pdo->conexao();
      $sql = 'INSERT INTO sorteio (parum, pardois) VALUES (:parum, :pardois)';

      if (!$this->pdo->executeNonQuery($sql, $params)){
        return -1;
      }else{
        print_r($params['parum'] . ' caiu com ' . $params['pardois'] .'</br>');
      }
    }

    public function pessoaexiste($params)
    {
      $sql = "SELECT count(*) as result FROM lista_pessoas where id = {$params}";
      $slcsrt = $this->pdo->executeQuery($sql);
      $decom = $slcsrt[0];
      $result = $decom['result'];
      return $result;
    }

    public function ezvasiasorteio()
    {
      $sql = "DELETE FROM sorteio";
      $slcsrt = $this->pdo->executeQuery($sql);
    }

  }
?>
