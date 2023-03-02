<?php
  /**
   * @codandobugs
   * Sistemas da informação
   * Exemplo simples em PHP contendo:
   * Entrada, Processamento e Saída.
   */
  
  // Entrada de um dado
  $email = $_POST["email"];

  /**
   * Processamento da Entrada
   * Garantia de padronização da entrada -> Validação -> Sanitização
   */
  $regexp = "/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/";
  $pattern = filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regexp)));
  $validate = (filter_var($pattern, FILTER_VALIDATE_EMAIL) ?? false);
  $sanitize = (filter_var($validate, FILTER_SANITIZE_EMAIL) ?? false);

  // Saída do processamento
  if (!$sanitize) {
    echo "O e-mail informado não é um e-mail válido";
  } else {
    echo "O e-mail informado na entrada é: " . $sanitize;
  }
