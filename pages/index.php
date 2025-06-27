<?php

require_once("../util/Conexao.php");
require_once("../modelo/Alunos.php");
require_once("../dao/AlunosDAO.php");
require_once("../validation/validacao.php");

$con = Conexao::getConexao();
$dao = new AlunosDAO();

$alunos = $dao->listarTodos(); // Método que retorna todos os alunos

$msgErro = "";
$nome = $_POST['nome'] ?? "";
$especie = $_POST['especie'] ?? "";
$origem = $_POST['origem'] ?? "";
$habilidadeEspecial = $_POST['habilidade'] ?? "";
$genero = $_POST['genero'] ?? "";
$situacao = $_POST['situacao'] ?? "";
$imagem = $_POST['imagem'] ?? "";

// Se o formulário foi enviado
if (isset($_POST['nome'])) {
    $erros = validarAlunos($_POST, $con);

    if (count($erros) == 0) {
        $aluno = new Alunos();
        $aluno->setNome(trim($_POST['nome']));
        $aluno->setEspecie($_POST['especie']);
        $aluno->setOrigem(trim($_POST['origem']));
        $aluno->setHabilidadeEspecial(trim($_POST['habilidade']));
        $aluno->setGenero($_POST['genero']);
        $aluno->setSituacao($_POST['situacao']);
        $aluno->setImagem(trim($_POST['imagem']));

        $dao->cadastrar($aluno);

        header("Location: index.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Sistema alunos de Monster High</title>
<link rel="stylesheet" href="../style/style.css">
</head>
<body>

<h1>Formulário</h1>

<form action="" method="POST">
    <div style="margin-bottom:10px;">
        <label for="nome">Informe o nome do aluno</label>
        <input name="nome" type="text" id="nome" value="<?= $nome ?>" />
    </div>

    <div style="margin-bottom:10px;">
        <label for="especie">Informe a espécie do aluno</label>
        <select name="especie" id="especie">
            <option value="">---Selecione---</option>
            <option value="A" <?= $especie == "A" ? "selected" : "" ?>>Animal</option>
            <option value="M" <?= $especie == "M" ? "selected" : "" ?>>Morto-vivo</option>
            <option value="O" <?= $especie == "O" ? "selected" : "" ?>>Outro</option>
        </select>
    </div>

    <div style="margin-bottom:10px;">
        <label for="origem">Informe a origem do aluno</label>
        <input name="origem" type="text" id="origem" value="<?= $origem ?>" />
    </div>

    <div style="margin-bottom:10px;">
        <label for="habilidade">Informe a habilidade especial do aluno</label>
        <input name="habilidade" type="text" id="habilidade" value="<?= $habilidadeEspecial ?>" />
    </div>

    <div style="margin-bottom:10px;">
        <label for="genero">Informe o gênero do aluno</label>
        <select name="genero" id="genero">
            <option value="">---Selecione---</option>
            <option value="F" <?= $genero == "F" ? "selected" : "" ?>>Feminino</option>
            <option value="M" <?= $genero == "M" ? "selected" : "" ?>>Masculino</option>
        </select>
    </div>

    <div style="margin-bottom:10px;">
        <label for="situacao">Informe a situação do aluno</label>
        <select name="situacao" id="situacao">
            <option value="">---Selecione---</option>
            <option value="A" <?= $situacao == "A" ? "selected" : "" ?>>Ativa</option>
            <option value="R" <?= $situacao == "R" ? "selected" : "" ?>>Repouso eterno</option>
            <option value="T" <?= $situacao == "T" ? "selected" : "" ?>>Transferido</option>
            <option value="E" <?= $situacao == "E" ? "selected" : "" ?>>Escondido nas sombras</option>
        </select>
    </div>

    <div style="margin-bottom:10px;">
        <label for="imagem">Adicione a imagem do aluno (link)</label>
        <input name="imagem" type="text" id="imagem" value="<?= $imagem ?>" />
    </div>

    <div style="margin-bottom:10px;">
        <button type="submit">Registrar</button>
    </div>
</form>

<div id="mensagem" style="color: red;">
    <?= $msgErro ?>
</div>

<h1>Listagem</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Origem</th>
        <th>Habilidade Especial</th>
        <th>Gênero</th>
        <th>Situação</th>
        <th>Imagem</th>
        <th>Excluir</th>
    </tr>

    <?php foreach($alunos as $a): ?>
        <tr>
            <td><?= $a->getId() ?></td>
            <td><?= $a->getNome() ?></td>
            <td>
                <?php
                switch ($a->getEspecie()) {
                    case 'A': echo "Animal"; break;
                    case 'M': echo "Morto-vivo"; break;
                    case 'O': echo "Outro"; break;
                    default: echo "Indefinido";
                }
                ?>
            </td>
            <td><?= $a->getOrigem() ?></td>
            <td><?= $a->getHabilidadeEspecial() ?></td>
            <td>
                <?php
                switch ($a->getGenero()) {
                    case 'F': echo "Feminino"; break;
                    case 'M': echo "Masculino"; break;
                    default: echo "Indefinido";
                }
                ?>
            </td>
            <td>
                <?php
                switch ($a->getSituacao()) {
                    case 'A': echo "Ativa"; break;
                    case 'R': echo "Repouso eterno"; break;
                    case 'T': echo "Transferido"; break;
                    case 'E': echo "Escondido nas sombras"; break;
                    default: echo "Indefinido";
                }
                ?>
            </td>
            <td>
                <?php if ($a->getImagem()): ?>
                    <img src="<?= $a->getImagem() ?>" alt="Imagem do aluno" width="60" />
                <?php endif; ?>
            </td>
            <td>
                <a href="excluir.php?id=<?= $a->getId() ?>" onclick="return confirm('Confirma a exclusão?')">
                    <button>Excluir</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


 <a href="card.php">
        <button>
            Ver os Cards
        </button>
    </a>

</body>
</html>
