<?php

  namespace app\core;

  use PDO;

  class Model
  {
    private static $connection;
    private $debug;
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct()
    {
      $this->debug = true;

      $this->host = "127.0.0.1";
      $this->user = "root";
      $this->pass = "";
      $this->db   = "teste";
    }

    public function conexao()
    {

      if (self::$connection == null) {
          self::$connection = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);
          self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
      }
      return self::$connection;
    }

    public function fimconexao()
    {
      self::$connection = null;
    }

    public function executeNonQuery($sql, $params = null)
    {
        try {
            $stmt = $this->conexao()->prepare($sql);
            return $stmt->execute($params);
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }

            return false;
        }
    }

    public function executeQuery($sql, $params = null)
    {
        try {
            $stmt = $this->conexao()->prepare($sql);

            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            return null;
        }
    }

  }
