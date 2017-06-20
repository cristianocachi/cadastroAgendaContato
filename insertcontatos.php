<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro - Agenda</title>
    </head>
    <body>
        <?php
        require_once 'conexao.php';
        $conexao = new Conexao('localhost', 'agenda', 'root', '', 3306);
        $dados = array('nome' => $_POST['nome'], 'telefone' => $_POST['telefone'], 'endereco' => $_POST['endereco']);
        $insert = $conexao->insert('contatos', $dados);
        echo "Cadastro com Sucesso!";
        ?>

        <form action="listagemcontatos.php" method="get">
            <input type="submit" name="submit" value="Voltar" />
        </form>
    </body>
</html>
