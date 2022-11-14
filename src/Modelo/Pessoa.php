<?php

namespace Anderson\Comercial\Modelo;
//require_once "AcessoAtributos.php";
require_once 'autoload.php';

use DateTimeInterface;

abstract class Pessoa
{
  use AcessoAtributos;
  protected string $nome;
  protected DateTimeInterface $dataNascimento;
  protected Endereco $endereco; // Associação pessoa endereço. Pessoa tem um endereço
  protected float $desconto;
  private static int $numDePessoas = 0;

  public function __construct(string $nome, DateTimeInterface $dataNascimento, Endereco $endereco) {
    $this->nome = $nome;
    $this->dataNascimento= $dataNascimento;
    $this->endereco = $endereco;
    self::$numDePessoas++;
    $this->setDesconto();
  }

public function __destruct()
{
  self::$numDePessoas--;
}

  public function getNome(): string{
    return $this->nome; 
  }
  public function getDataNascimento(): DateTimeInterface {
    return $this->dataNascimento; 
  }

  public function getEndereco(): Endereco {
    return $this->endereco; 
  }

  public function setNome(string $nome): void {
    $this->nome = $nome; 
  }
  
  public function setDataNascimento(DateTimeInterface $dataNascimento): void {
    $this->dataNascimento = $dataNascimento; 
  }

  public function setEndereco(Endereco $endereco): void {
    $this->endereco = $endereco; 
  }

  public static function getNumDePessoas(): int {
    return self::$numDePessoas;
  }

  //private function validaIdade(int $idade): void {
  //  if($this->idade > 0 AND $this->idade < 120){
  //   $this->idade = $idade;
  //  } else {
  //    echo "Idade não permitida!";
  //    exit;
  //  }
  //}
  
  public function idade(): int {
    return $this->getDataNascimento()->diff(new \DataTimeImmutable())->y; 
  }
  
  protected abstract function setDesconto() : void;

  public function getDesconto(): float {
    return  $this->desconto;
  }

  public abstract function __toString(): string;

}
