<?php
require_once("../modelo/Alunos.php");
require_once("../util/Conexao.php");

class AlunosDAO {

    // Cadastrar aluno
    public function cadastrar(Alunos $aluno) {
        $sql = "INSERT INTO alunos (nome, especie, origem, habilidade_especial, genero, situacao, imagem)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::getConexao();
        $stm = $con->prepare($sql);

        $stm->execute([
            $aluno->getNome(),
            $aluno->getEspecie(),
            $aluno->getOrigem(),
            $aluno->getHabilidadeEspecial(),
            $aluno->getGenero(),
            $aluno->getSituacao(),
            $aluno->getImagem()
        ]);
    }

    // Listar todos os alunos
    public function listarTodos() {
        $sql = "SELECT * FROM alunos";

        $con = Conexao::getConexao();
        $stm = $con->prepare($sql);
        $stm->execute();

        $registros = $stm->fetchAll();
        $alunos = $this->mapAlunos($registros);
        return $alunos;
    }

    // Mapear array do banco para objetos Alunos
    private function mapAlunos(array $registros) {
        $alunos = array();

        foreach ($registros as $reg) {
            $a = new Alunos();
            $a->setId($reg['id']);
            $a->setNome($reg['nome']);
            $a->setEspecie($reg['especie']);
            $a->setOrigem($reg['origem']);
            $a->setHabilidadeEspecial($reg['habilidade_especial']);
            $a->setGenero($reg['genero']);
            $a->setSituacao($reg['situacao']);
            $a->setImagem($reg['imagem']);

            array_push($alunos, $a);
        }

        return $alunos;
    }

    public function buscarPorId($id) {
    $sql = "SELECT * FROM alunos WHERE id = ?";

    $con = Conexao::getConexao();
    $stm = $con->prepare($sql);
    $stm->execute([$id]);

    $registros = $stm->fetchAll();

    if (count($registros) > 0) {
        $dados = $registros[0]; // Pega o primeiro (e único) registro

        $aluno = new Alunos();
        $aluno->setId($dados['id']);
        $aluno->setNome($dados['nome']);
        $aluno->setEspecie($dados['especie']);
        $aluno->setOrigem($dados['origem']);
        $aluno->setHabilidadeEspecial($dados['habilidade_especial']);
        $aluno->setGenero($dados['genero']);
        $aluno->setSituacao($dados['situacao']);
        $aluno->setImagem($dados['imagem']);

        return $aluno;
    }

    return null;
}

}
