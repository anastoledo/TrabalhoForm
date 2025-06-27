CREATE TABLE alunos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    especie VARCHAR(30) NOT NULL, /*A=Animal, M=Morto-vivo, O=Outro*/
    origem VARCHAR(30) NOT NULL, /*Lobisomen, Vampiro, Centauro*/
    habilidade_especial VARCHAR(40) NOT NULL,
    genero VARCHAR(1) NOT NULL, /* M=Masculino, F=Feminino  */
    situacao VARCHAR(1) NOT NULL, /* A=Ativa, R=Repouso eterno (Recuperação), T=Transferida, E=Escondida nas sombras (Formado) */
    imagem VARCHAR(1000) NOT NULL
    CONSTRAINT pk_personagens PRIMARY KEY (id)
);
