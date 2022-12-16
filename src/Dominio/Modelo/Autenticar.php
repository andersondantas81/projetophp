<?php
  
  namespace Anderson\Comercial\Dominio\Modelo;
  
    interface Autenticar {
      public function login(string $nome, string $senha): void;
    }