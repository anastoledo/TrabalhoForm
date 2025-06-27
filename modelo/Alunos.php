<?php 

Class Alunos {
     //Atributos
     private int $id;
     private string $nome;
     private string $especie;
     private string $origem;
     private string $habilidadeEspecial;
     private string $genero;
     private string $situacao;
     private string $imagem;

     public function __construct(string $nome = '', string $especie = '', string $origem = '', string $habilidadeEspecial = '', string $genero = '', string $situacao = '', string $imagem = ''){
        
            $this->nome = $nome;
            $this->especie = $especie;
            $this->origem = $origem;
            $this->habilidadeEspecial = $habilidadeEspecial;
            $this->genero = $genero;
            $this->situacao = $situacao;
            $this->imagem = $imagem;

    }

     /**
      * Get the value of id
      */
     public function getId(): int
     {
          return $this->id;
     }

     /**
      * Set the value of id
      */
     public function setId(int $id): self
     {
          $this->id = $id;

          return $this;
     }

     /**
      * Get the value of nome
      */
     public function getNome(): string
     {
          return $this->nome;
     }

     /**
      * Set the value of nome
      */
     public function setNome(string $nome): self
     {
          $this->nome = $nome;

          return $this;
     }

     /**
      * Get the value of especie
      */
     public function getEspecie(): string
     {
          return $this->especie;
     }

     /**
      * Set the value of especie
      */
     public function setEspecie(string $especie): self
     {
          $this->especie = $especie;

          return $this;
     }

     /**
      * Get the value of origem
      */
     public function getOrigem(): string
     {
          return $this->origem;
     }

     /**
      * Set the value of origem
      */
     public function setOrigem(string $origem): self
     {
          $this->origem = $origem;

          return $this;
     }

     /**
      * Get the value of habilidadeEspecial
      */
     public function getHabilidadeEspecial(): string
     {
          return $this->habilidadeEspecial;
     }

     /**
      * Set the value of habilidadeEspecial
      */
     public function setHabilidadeEspecial(string $habilidadeEspecial): self
     {
          $this->habilidadeEspecial = $habilidadeEspecial;

          return $this;
     }

     /**
      * Get the value of genero
      */
     public function getGenero(): string
     {
          return $this->genero;
     }

     /**
      * Set the value of genero
      */
     public function setGenero(string $genero): self
     {
          $this->genero = $genero;

          return $this;
     }

     /**
      * Get the value of situacao
      */
     public function getSituacao(): string
     {
          return $this->situacao;
     }

     /**
      * Set the value of situacao
      */
     public function setSituacao(string $situacao): self
     {
          $this->situacao = $situacao;

          return $this;
     }

     /**
      * Get the value of img
      */
     public function getImagem(): string
     {
          return $this->imagem;
     }

     /**
      * Set the value of img
      */
     public function setImagem(string $imagem): self
     {
          $this->imagem = $imagem;

          return $this;
     }
}