<?php
require_once 'global.php';

class Categoria
{

    private $id;
    private $nome;

    public function __construct()
    {
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function listar()
    {
        $conexao = Conexao::chamarConexao();
        $query = "SELECT id, nome FROM categorias ORDER BY NOME";
        $resultado = $conexao->query($query);

        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function alterar()
    {
        $conexao  = Conexao::chamarConexao();
        $query = "UPDATE categorias SET nome= :nome WHERE id= :id";
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());

        $stmt->execute();
    }
    public function selecionar(Categoria $categoria)
    {
        $conexao  = Conexao::chamarConexao();

        $query = "SELECT id, nome FROM categorias WHERE id= :id";
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id', $this->getId());
        $stmt->execute();

        $lista = $stmt->fetch();
        $categoria->setNome($lista['nome']);
    }
    public function inserir()
    {
        $conexao  = Conexao::chamarConexao();
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->getNome());

        $stmt->execute();
    }

    public function excluir(Categoria $categoria)
    {

        $conexao  = Conexao::chamarConexao();
        $query = "DELETE FROM categorias WHERE id= :id";
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id', $categoria->getId());
        $stmt->execute();

        $conexao->exec($query);
    }
}
