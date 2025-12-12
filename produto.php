<?php 
require_once("DAO/ProdutoDao.php");

$id = $_GET['id'] ?? null;

$ProdutoDao = new ProdutoDao;
$produto = $ProdutoDao->buscarPorId($id);
?>

<?php require __DIR__ . "/assets/elements/header.php"; ?>

<main class="produto">
    <div class="container">
        <!-- Navegação -->
        <nav class="mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
                <li class="breadcrumb-item active"><?= $produto->getNome()?></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Imagem do Produto -->
            <div class="col-lg-6 mb-4">
                <img src="<?= $produto->getImagem() ?>" class="img-fluid rounded" alt="<?= $produto->getNome() ?>">
            </div>

            <!-- Informações do Produto -->
            <div class="col-lg-6">
                <h1 class="h2"><?= $produto->getNome() ?></h1>

                <!-- Preço -->
                <div class="preco-info mb-3">
                    <h3 class="text-primary">R$ <?= number_format($produto->getPreco(), 2, ',', '.') ?></h3>
                    <p class="text-success">Em até 12x sem juros</p>
                </div>

                <!-- Formulário de Compra -->
                <form action="carrinho.php" method="POST" class="comprar-form">
                    <input type="hidden" name="produto_id" value="1">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tamanho" class="form-label">Tamanho</label>
                            <select name="tamanho" id="tamanho" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                                <option value="GG">GG</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <select name="quantidade" id="quantidade" class="form-select">
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 py-3">
                        <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                    </button>
                </form>

                <!-- Informações Adicionais -->
                <div class="mt-4">
                    <div class="d-flex gap-4 text-center">
                        <div>
                            <i class="bi bi-truck display-6 text-primary"></i>
                            <p class="small mb-0">Frete Grátis<br>acima de R$ 199</p>
                        </div>
                        <div>
                            <i class="bi bi-arrow-repeat display-6 text-primary"></i>
                            <p class="small mb-0">Troca Grátis<br>em 30 dias</p>
                        </div>
                        <div>
                            <i class="bi bi-shield-check display-6 text-primary"></i>
                            <p class="small mb-0">Compra<br>100% Segura</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require __DIR__ . "/assets/elements/footer.php"; ?>