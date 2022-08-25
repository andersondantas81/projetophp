<?php
  
  namespace Anderson\Comercial\Modelo;
    interface Autenticar {
      public function login(string $nome, string $senha): void;
    }