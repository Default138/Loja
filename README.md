# Loja

Loja virtual simples em **PHP**, com **Bootstrap** e **MySQL**, feita para praticar o acesso ao banco com **PDO**, o padrão **DAO** e a separação do código em camadas.

## O que já funciona

- **Página inicial** com carrossel e os produtos vindos do banco (`index.php`)
- **Listagem de produtos** (`produtos.php`)
- **Página de cada produto** (`produto.php?id=...`)
- Acesso ao banco pela classe `ProdutoDao`: `inserir`, `listar` e `buscarPorId`

## Em construção

- O **carrinho** (`carrinho.php`) e o **login** (`login.php`) são telas de "página em construção"
- Os **filtros** da listagem ainda são só visuais (não filtram os produtos)

## Estrutura

```text
index.php, produtos.php, produto.php   páginas da loja
carrinho.php, login.php                telas em construção
DAO/ProdutoDao.php                     acesso ao banco (PDO)
modelo/Produto.php                     classe do produto
util/conexao.php                       conexão com o MySQL
assets/                                estilos, fontes e trechos de página (header e footer)
db_loja.sql                            cria o banco e a tabela, com 4 produtos de exemplo
```

## Como executar

Precisa do XAMPP (Apache e MySQL).

1. Copie esta pasta para `C:\xampp\htdocs\Loja`.
2. Inicie o **Apache** e o **MySQL** no painel do XAMPP.
3. No phpMyAdmin, importe o arquivo `db_loja.sql`. Ele cria o banco `db_loja`.
4. Abra `http://localhost/Loja/`.

A conexão usa `localhost:3306`, usuário `root` e senha vazia (padrão do XAMPP). Para mudar, edite `util/conexao.php`.
As imagens dos produtos de exemplo vêm da internet, então é preciso estar conectado para vê-las.

## Tecnologias

PHP, MySQL, PDO, Bootstrap 5
