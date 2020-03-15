<?php

class Produto
{
    private $id;
    private $nome;
    private $preco;
    private $quantidade;
    private $categoriaId;

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

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    public function getCategoriaId()
    {
        return $this->categoriaId;
    }


    public function listar()
    {
        $conexao = Conexao::chamarConexao();

        $query = "SELECT prod.id, prod.nome, prod.preco, prod.quantidade, prod.categoria_id, cat.nome as catNome 
        FROM estoque.produtos prod 
        INNER JOIN estoque.categorias cat 
        ON prod.categoria_id = cat.id ORDER BY prod.id";
        $resultado = $conexao->query($query);

        $lista = $resultado->fetchAll();

        return $lista;
    }

    public function inserir()
    {

        $conexao = Conexao::chamarConexao();
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id ) 
                VALUES (:nome, :preco, :quantidade, :categoria_id) ";
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':preco', $this->getPreco());
        $stmt->bindValue(':quantidade', $this->getQuantidade());
        $stmt->bindValue(':categoria_id', $this->getCategoriaId());
        $stmt->execute();
    }
}
