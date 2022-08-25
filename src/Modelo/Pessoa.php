<?php

namespace Anderson\Comercial\Modelo;
//require_once "AcessoAtributos.php";
require_once 'autoload.php';

abstract class Pessoa
{
  use AcessoAtributos;
  protected string $nome;
  protected int $idade;
  protected Endereco $endereco; // Associação pessoa endereço. Pessoa tem um endereço
  protected float $desconto;
  private static int $numDePessoas = 0;

  public function __construct(string $nome, int $idade, Endereco $endereco) {
    $this->nome = $nome;
    $this->idade = $idade;
    $this->endereco = $endereco;
    self::$numDePessoas++;
    $this->validaIdade($idade);
    $this->setDesconto();
  }

public function __destruct()
{
  self::$numDePessoas--;
}

  public function getNome(): string{
    return $this->nome; 
  }
  public function getIdade(): int{
    return $this->idade; 
  }

  public function getEndereco(): Endereco{
    return $this->endereco; 
  }

  public function setNome(string $nome): void{
    $this->nome= $nome; 
  }
  
  public function setIdade(string $idade): void{
    $this->idade= $idade; 
  }

  public function setEndereco(Endereco $endereco): void{
    $this->endereco = $endereco; 
  }

  public static function getNumDePessoas(): int{
    return self::$numDePessoas;
  }

  private function validaIdade(int $idade): void{
    if($this->idade > 0 AND $this->idade < 120){
      $this->idade = $idade;
    } else {
      echo "Idade não permitida!";
      exit;
    }
  }
  protected abstract function setDesconto() : void;

  public function getDesconto(): float {
    return  $this->desconto;
  }

  public abstract function __toString(): string;

}
