<?php
  namespace app\core;

  class Controller
  {
    protected function load($view, $params = [])
    {
      $twig = new \Twig\Environment(
          new \Twig\Loader\FilesystemLoader('../app/view/')
      );

      echo $twig->render($view . '.twig.php', $params);
    }

  }
?>
