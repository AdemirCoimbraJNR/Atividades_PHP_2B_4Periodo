# TESTES — Portal do Aluno

Ambiente: PHP 8.3 (servidor embutido, `php -S 127.0.0.1:8099`), testes executados com `curl` mantendo cookie de sessão.
Validação de sintaxe: `php -l` em todos os arquivos — sem erros.

| Nº | Ação | Resultado esperado | Resultado obtido | Status |
| --- | --- | --- | --- | --- |
| 1 | Abrir `index.php` | Título, links e rodapé | Título "Portal do Aluno - Senac", 3 links e `<footer>` presentes | OK |
| 2 | Nome vazio | Erro de nome obrigatório | "O nome é obrigatório." | OK |
| 3 | E-mail `teste` | Erro de e-mail inválido | "Informe um e-mail válido." | OK |
| 4 | Idade `0` | Erro de idade inválida | "A idade deve ser um número inteiro maior que zero." | OK |
| 5 | `Ana Souza`, `ana@senac.br`, `22` | Cadastro exibido em `resultado.php` | Nome, e-mail, idade e mensagem de sucesso exibidos | OK |
| 6 | Atualizar `resultado.php` | Dados permanecem; mensagem some | Dados continuam; mensagem não reaparece | OK |
| 7 | Encerrar sessão e abrir resultado | Nenhum cadastro encontrado | Redireciona para `index.php`; resultado mostra "Nenhum aluno cadastrado nesta sessão." | OK |
| 8 | Nome `<h1>Ana</h1>` | Exibido como texto | Saída `&lt;h1&gt;Ana&lt;/h1&gt;` (escapado na exibição) | OK |
| 9 | Nome/idade corretos + e-mail inválido | Valores preservados no formulário | Campos nome=`Ana`, e-mail=`teste`, idade=`20` preenchidos | OK |
| Extra | Acessar `processar_cadastro.php` via GET | Redirecionar ao formulário | HTTP 302 para `cadastro.php` | OK |
| Extra | Nome `"  Ana Souza  "` | Espaços removidos | Salvo como `Ana Souza` | OK |

## Mapeamento dos arquivos originais

| Recebido | Final |
| --- | --- |
| pagina_inicial.php | index.php |
| formulario_aluno.php | cadastro.php |
| acao_cadastrar.php | processar_cadastro.php |
| visualizar_resultado.php | resultado.php |
| encerrar.php | logout.php |
| layout_topo.php | includes/cabecalho.php |
| layout_base.php | includes/rodape.php |
| utilitarios.php | includes/funcoes.php |
