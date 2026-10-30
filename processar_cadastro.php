<?php
// TODO 09: sessão disponível antes de qualquer operação.
session_start();

// TODO 10: funções carregadas uma única vez.
require_once __DIR__ . "/includes/funcoes.php";

// TODO 11: só processa requisições POST; acesso direto volta ao formulário.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

// TODO 12: recebimento dos dados.
// Nome: null (campo ausente) vira "" e espaços das pontas são removidos (limparTexto usa trim).
$nome  = limparTexto(filter_input(INPUT_POST, "nome") ?? "");
// E-mail: false (formato inválido) ou null (campo ausente) indicam problema.
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
// Idade: false (não é inteiro) ou null (campo ausente) indicam problema.
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

// TODO 13: validações na ordem de prioridade definida.
$erro = "";
if ($nome === "") {
    $erro = "O nome é obrigatório.";
} elseif ($email === false || $email === null) {
    $erro = "Informe um e-mail válido.";
} elseif ($idade === false || $idade === null || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

// TODO 14: cadastro inválido -> guarda erro e dados digitados, volta ao formulário.
if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    $_SESSION["dados_anteriores"] = [
        "nome"  => $nome,
        // valor bruto, pois $email pode ser false/null quando inválido
        "email" => (string) ($_POST["email"] ?? ""),
        "idade" => (string) ($_POST["idade"] ?? ""),
    ];
    header("Location: cadastro.php");
    exit;
}

// TODO 15: cadastro válido -> guarda o aluno e a mensagem, vai ao resultado.
$_SESSION["aluno"] = [
    "nome"  => $nome,
    "email" => $email,
    "idade" => $idade,
];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
