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
        $query = "SELECT id, nome FROM categorias";
        $resultado = $conexao->query($query);

        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function alterar(Categoria $categoria)
    {
        $conexao  = Conexao::chamarConexao();
        $query = "UPDATE categorias SET nome='" . $categoria->getNome() . "' WHERE id=" . $categoria->getId();

        $conexao->exec($query);
    }
    public function selecionar(Categoria $categoria)
    {
        $conexao  = Conexao::chamarConexao();
        $query = "SELECT id, nome FROM categorias WHERE id=" . $categoria->getId();

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();

        foreach ($lista as $item) {
            $categoria->setId($item['id']);
            $categoria->setNome($item['nome']);
            return $categoria;
        }
    }
    public function inserir(Categoria $categoria)
    {

        $conexao  = Conexao::chamarConexao();
        $query = "INSERT INTO categorias (nome) VALUES ('" . $categoria->getNome() . "')";
        $conexao->exec($query);
    }

    public function excluir(Categoria $categoria)
    {

        $conexao  = Conexao::chamarConexao();
        $query = "DELETE FROM categorias WHERE id=" . $categoria->getId();
        $conexao->exec($query);
    }
}
