<?php
require_once 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $telefone = $_GET["telefone"];
    $endereco = $_GET["endereco"];

} else {
    $id = "";
    $nome= "";
    $telefone = "";
    $endereco = "";

}

if (isset($_POST['id']) && isset($_POST['nome'])) {
    if ($_POST['id'] !== '') {
        atualizar($_POST['id'], $_POST['nome'], $_POST['telefone'], $_POST['endereco']);
    } else {
        salvar($_POST['nome'], $_POST['telefone'], $_POST['endereco']);
    }
}

function salvar($nome, $telefone, $endereco) {
    $conexao = new Conexao('localhost', 'agenda', 'root', '', 3306);
    $dados = array('nome' => $nome, 'telefone' => $telefone, 'endereco' => $endereco);
    $insert = $conexao->insert('contatos', $dados);
    header("Location: listagemcontatos.php");
}

function atualizar($id, $nome, $telefone, $endereco) {
    $conexao = new Conexao('localhost', 'agenda', 'root', '', 3306);
    $dados = array('nome' => $nome, 'telefone' => $telefone, 'endereco' => $endereco);
    $insert = $conexao->update('contatos','id',$id, $dados);
    header("Location: listagemcontatos.php");
}
?>

        <form action="" method="post">
            Id:  <input type="text" name="id" readonly="true" value="<?php echo $id; ?>"/><br />
            Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"/><br /><br />
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone; ?>"/><br/><br />
            Endereço: <input type="text" name="endereco" value="<?php echo $endereco; ?>"/><br/><br />
           
            <input type="submit" name="submit" value="Salvar" />
        </form>
