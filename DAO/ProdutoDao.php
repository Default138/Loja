<?php

require_once("modelo/Produto.php");
require_once("util/conexao.php");

class ProdutoDao {

    public function inserir(Produto $produto) {

        $sql = "INSERT INTO produtos 
                (nome, preco, imagem, categoria)
                VALUES 
                (?, ?, ?, ?)";

        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
            $stmt->execute(array($produto->getNome(),
                                $produto->getPreco(),
                                $produto->getImagem(),
                                $produto->getCategoria())
                            );

    }

    public function listar() {
        $produtos = array();
        $sql = "SELECT * FROM produtos";

        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($dados as $dado){
            $produto = $this->map($dado);
            array_push($produtos, $produto);
        }

        return $produtos;
    }

    public function buscarPorId($id){
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $conn = Conexao::getConexao();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$produto) {
        return null; // Retorna null se não encontrar o produto
    }
    
    $this->map($produto);
    return $produto; // Retorna o próprio objeto atualizado
}
    private function map($dado){
        $produto = new Produto();
        $produto->setNome($dado['nome'] ?? "");
        $produto->setPreco($dado['preco'] ?? 0.00);
        $produto->setImagem($dado['imagem'] ?? "https://lipsum.app/632x360");
        $produto->setCategoria($dado['categoria'] ?? "");
        return $produto;
    }
}