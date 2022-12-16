<?php

// require_once 'src/Modelo/Endereco.php';
// require_once 'src/Modelo/Funcionario.php';
require_once 'autoload.php';

use Anderson\Comercial\Dominio\Modelo\Pessoa;
use Anderson\Comercial\Dominio\Modelo\Endereco;
use Anderson\Comercial\Dominio\Modelo\Funcionario;

$endereco = new Endereco('CE', 'Fortaleza', 'Rua Padré Chevalier', '606', 'Joaquim Távora', '60130-080');

echo '<pre>';
  $funcionario = new Funcionario('Desencolvedor', 5000, 'Anderson', 30, $endereco);

  $funcionario->setSenha("123");
  $funcionario->login('Anderson', "123");
  var_dump($funcionario);

  echo $endereco->bairro;
  echo $funcionario->__toString();
echo '</pre>';

?>