<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro - Agenda </title>
    </head>
    <body>
        <form action="agenda.php" method="get">
            <input type="submit" name="submit" value="Novo Contato!">
        </form>
        <?php
        require_once 'conexao.php';
        $conexao = new Conexao('localhost', 'agenda', 'root', '', 3306);
        $select = $conexao->select('contatos');
        echo "<table><tr><td>ID</td><td>NOME</td><td>TELEFONE</td><td>ENDEREÇO</td></tr>";

        foreach ($select as $value) {
            echo "<tr>";
			
            echo "<td>";
            echo $value['id'];
            echo "</td>";
			
            echo "<td>";
            echo $value['nome'];
            echo "</td>";
			
            echo "<td>";
            echo $value['telefone'];
            echo "</td>";
			
            echo "<td>";
            echo $value['endereco'];
            echo "</td>";
			
			echo "<td>";
            echo "<a href='agenda.php?id={$value["id"]}&nome={$value["nome"]}&telefone={$value["telefone"]}&endereco={$value["endereco"]}'>Editar</a>";
            echo "</td>";
			
            echo "<td>";
            echo "<a onClick=\"javascript: return confirm('Deseja realmente apagar este registro?');\" href='listagemcontatos.php?id={$value["id"]}'>Apagar</a>";
            echo "</td>";
			
            echo "</tr>";
			
        }
        echo "</Table>";
        if (isset($_GET['id'])) {
            deletar($_GET['id']);
        }

        function deletar($id) {
            $conexao = new Conexao('localhost', 'agenda', 'root', '', 3306);
            $conexao->delete('id', $id, 'contatos');
            header("Location: listagemcontatos.php");
        }
        ?>
    </body>
</html>
