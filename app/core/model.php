<?php

  namespace app\core;

  class Model
  {
    private static $con;
    private $debug;
    private $host;
    private $user;
    private $pass;
    private $db;
  }

  private function __construct()
  {
    $this->debug = true;

    $this->host = "DB_HOST";
    $this->user = "DB_USER";
    $this->pass = "DB_PASS";
    $this->db   = "DB_NAME";

    $con = mysqli_connect($host, $user, $pass, $db);
  }
