<?php

namespace Anderson\Comercial\Dominio\Modelo;

class Cliente extends Pessoa
{
  public float $renda;
  public string $dataNascimento;

  public function __construct(string $dataNascimento, float $renda, string $nome, int $idade, Endereco $endereco) {
    parent::__construct($nome, $idade, $endereco);
    $this->dataNascimento = $dataNascimento;
    $this->renda = $renda;
  }

  public function getDataNascimento(): string {
    return $this->dataNascimento; 
  }
  public function getRenda(): float {
    return $this->renda; 
  }
  
  public function setDataNascimento(string $dataNascimento): void {
    $this->dataNascimento = $dataNascimento; 
  }
  public function setRenda(string $renda): void {
      $this->renda= $renda; 
  }

  public function setDesconto(): void {
    $this -> desconto = 0.05;
  }

  public function __toString(): string
  {
    return "<p>Nome: " . $this->nome . 
               "<br>Idade: " . $this->idade . "anos" .
               "<br>Endereço: " . $this->endereco->getNomeLogradouro() . ", " .
               $this->endereco->getNumero() . ", " .
               $this->endereco->getBairro() . ", " .
               $this->endereco->getCep() . ", " .
               "<br>Data de nascimento: " . $this->dataNascimento . ", " .
               "<br>Renda: R$ " . $this->renda .
           "</p>";
  }
  
}
