<?php

namespace Anderson\Comercial\Modelo;
//require_once "Autenticar.php";
require_once 'autoload.php';

use DateTimeInterface;

class Funcionario extends Pessoa implements Autenticar
{
  public string $cargo;
  public float $salario;
  private string $senha;

  public function __construct(string $cargo, float $salario, string $nome, DateTimeInterface $dataNascimento, Endereco $endereco) {
    parent::__construct($nome, $dataNascimento, $endereco);
    $this->cargo= $cargo;
    $this->salario = $salario;
  }

  public function getCargo(): string {
    return $this->cargo; 
  }
  public function getSalario(): float {
    return $this->salario; 
  }
  
  public function setCargo(string $cargo): void {
    $this->cargo = $cargo; 
  }
  public function setSalario(string $salario): void {
      $this->salario= $salario; 
  }

  public function setDesconto(): void {
    $this -> desconto = 0.10;
  }

  public function login($nome, $senha): void{
    if($this->nome === $nome && $this->senha === $senha){
      echo "<p>[ LOGIN: Usuário ".$this->nome ." autenticado com sucesso! ]</p>";
    }else {
      echo "<p>[ Erro! Usuário ou senha incorreta. ]</p>";
    }

  }

  public function __toString(): string
  {
    return "<p>Nome: " . $this->nome . 
               "<br>Idade: " . $this->idade . "anos" .
               "<br>Nasc.: " . $this->getDataNascimento()->format('d/m/Y') .
               "<br>Endereço: " . $this->endereco->getNomeLogradouro() . ", " .
               $this->endereco->getNumero() . ", " .
               $this->endereco->getBairro() . ", " .
               $this->endereco->getCep() . ", " .
               "<br>Cargo: " . $this->cargo . ", " .
               "<br>Salário: R$ " . $this->salario .
           "</p>";
  }

  public function setSenha(string $senha): void {
    $this->senha = $senha;
  }
  
}
