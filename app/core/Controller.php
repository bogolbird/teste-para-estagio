<?php

namespace app\core;
use app\model\ModelCadastro;

class Controller
{
    protected function load(string $view, $params = [])
    {
      $twig = new \Twig\Environment(
          new \Twig\Loader\FilesystemLoader('../app/view/')
      );

        $twig->addGlobal('BASE', BASE);
        echo $twig->render($view . '.twig.php', $params);
    }

}
