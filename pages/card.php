<?php
require_once("../util/Conexao.php");
require_once("../modelo/Alunos.php");
require_once("../dao/AlunosDAO.php");

$con = Conexao::getConexao();
$dao = new AlunosDAO();

$alunos = array();

if (isset($_GET['id'])) {
    $aluno = $dao->buscarPorId($_GET['id']);
    if ($aluno) {
        array_push($alunos, $aluno);
    }
} else {
    $alunos = $dao->listarTodos();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <title>Cards dos Alunos</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<h1 style=>Alunos cadastrados</h1>

<div class="cards-container">
<?php foreach ($alunos as $a): ?>
  <div class="card">
    <img src="<?= $a->getImagem() ?>" alt="Imagem do aluno">
    <div class="card__content">
      <p class="card__title"><?= $a->getNome() ?></p>
      <p class="card__description">
        <strong>Espécie:</strong>
        <?php
          switch ($a->getEspecie()) {
            case 'A': echo "Animal"; break;
            case 'M': echo "Morto-vivo"; break;
            case 'O': echo "Outro"; break;
            default: echo "Indefinido";
          }
        ?><br>

        <strong>Origem:</strong> <?= $a->getOrigem() ?><br>
        <strong>Habilidade:</strong> <?= $a->getHabilidadeEspecial() ?><br>
        <strong>Gênero:</strong>
        <?php 
        switch($a->getGenero()){
          case 'M': echo "Masculino"; break;
          case 'F': echo "Feminino"; break;
          default : echo "Indefinido";
        }
        ?><br>
        <strong>Situação:</strong>
        <?php
          switch ($a->getSituacao()) {
            case 'A': echo "Ativa"; break;
            case 'R': echo "Repouso eterno"; break;
            case 'T': echo "Transferido"; break;
            case 'E': echo "Escondido nas sombras"; break;
            default: echo "Indefinido";
          }
        ?>
      </p>
      <div class="card__actions">
        <a href="excluir.php?id=<?= $a->getId() ?>" onclick="return confirm('Confirma a exclusão deste aluno?')">Excluir Card</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

</body>
</html>
