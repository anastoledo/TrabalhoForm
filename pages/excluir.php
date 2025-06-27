<?php
require_once("../util/Conexao.php");

$con = Conexao::getConexao();

if (!isset($_GET['id'])) {
    echo "ID do personagem não informado.";
    echo "<br><a href='index.php'><button>Voltar</button></a>";
} else {
    $id = $_GET['id'];

    $sql = "DELETE FROM alunos WHERE id = ?";
    $stm = $con->prepare($sql);
    $stm->execute([$id]);

    header("Location: index.php"); // ou cards.php, se estiver deletando dos cards
}
