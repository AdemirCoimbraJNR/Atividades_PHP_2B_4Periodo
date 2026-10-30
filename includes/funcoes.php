<?php
// TODO 25: validação de e-mail com o filtro nativo do PHP.
// filter_var devolve o e-mail (string) se válido ou false se inválido;
// a comparação com false converte o resultado em booleano.
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// TODO 26 (bônus): remove espaços desnecessários no início e no fim do texto.
function limparTexto($texto) {
    return trim((string) $texto);
}
