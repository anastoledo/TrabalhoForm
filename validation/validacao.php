<?php  

function validarAlunos($dados, $con) {
    $erros = array();

    // Nome
    if (!isset($dados['nome']) || trim($dados['nome']) === '') {
        array_push($erros, "Informe o nome do aluno!");
    } else {
        $nome = trim($dados['nome']);
        if (strlen($nome) < 3 || strlen($nome) > 50) {
            array_push($erros, "O nome deve ter entre 3 e 50 caracteres.");
        } else {
            // Verificar se já existe aluno com esse nome
            $sql = "SELECT * FROM alunos WHERE nome = ?";
            $stm = $con->prepare($sql);
            $stm->execute([$nome]);
            $registros = $stm->fetchAll();

            if (count($registros) > 0) {
                array_push($erros, "Já existe um aluno com esse nome.");
            }
        }
    }

    // Espécie
    if (!isset($dados['especie']) || $dados['especie'] === '') {
        array_push($erros, "Informe a espécie do aluno!");
    }

    // Origem
    if (!isset($dados['origem']) || trim($dados['origem']) === '') {
        array_push($erros, "Informe a origem do aluno!");
    }

    // Habilidade especial
    if (isset($dados['habilidade']) && trim($dados['habilidade']) !== '') {
        if (strlen(trim($dados['habilidade'])) > 50) {
            array_push($erros, "A habilidade especial pode ter no máximo 50 caracteres.");
        }
    }

    // Gênero
    if (!isset($dados['genero']) || $dados['genero'] === '') {
        array_push($erros, "Informe o gênero do aluno!");
    }

    // Situação
    if (!isset($dados['situacao']) || $dados['situacao'] === '') {
        array_push($erros, "Informe a situação do aluno!");
    }

    return $erros;
}
