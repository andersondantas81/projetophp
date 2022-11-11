<?php

  namespace Anderson\Comercial\Modelo;

  class Produto {
    private ?int $idProduto;
    private string $nomeProduto;
    private float $precoProduto;
    
    public function __construct(?int $idProduto, string $nomeProduto, float $precoProduto) {
      $this->idProduto = $idProduto;
      $this->nomeProduto = $nomeProduto;
      $this->precoProduto = $precoProduto;
    }
    
    public function getIdProduto(): ?int {
      return $this->idProduto;
    }
    
    public function getNomeProduto(): string {
      return $this->nomeProduto;
    }
    
    public function getPrecoProduto(): float {
      return $this->precoProduto;
    }
    
    public function setIdProduto(): void {
      return $this->idProduto = $idProduto;
    }
    
    public function setNomeProduto(): void {
      return $this->nomeProduto = $nomeProduto;
    }
    
    public function setPrecoProduto(): void {
      return $this->precoProduto = $precoProduto;
    }
    
