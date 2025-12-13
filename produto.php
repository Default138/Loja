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

            <!-- Informacoes do Produto -->
            <div class="col-lg-6">
                <h1 class="h2"><?= $produto->getNome() ?></h1>

                <div class="preco-info mb-3">
                        <!-- Preço com desconto -->
                        <div class="d-flex align-items-center">
                            <span class="text-danger fw-bold fs-5 me-2">
                                R$ <?php 
                                    $precoOriginal = $produto->getPreco();
                                    $desconto = $precoOriginal * 0.3;
                                    $precoComDesconto = $precoOriginal - $desconto;
                                    echo number_format($precoComDesconto, 2, ',', '.');
                                ?>
                            </span>
                            <span class="text-muted text-decoration-line-through fs-6">
                                R$ <?php echo number_format($precoOriginal, 2, ',', '.'); ?>
                            </span>
                            <span class="badge bg-danger ms-2">-30%</span>
                        </div>
                        <small class="text-success">
                            <i class="bi bi-truck"></i> Frete grátis
                        </small>
                        <p class="text-primary mt-1">Em até 12x sem juros</p>
                        
                        <!-- Badge de estoque limitado para produto ID = 2 -->
                         <?php if ($produto->getId() == 2): ?>
                            <div class="mt-2">
                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Últimas unidades
                                </span>
                            </div>
                    <?php endif; ?>
                </div>

                <!-- Formulario de Compra -->
                <form action="carrinho.php" method="POST" class="comprar-form">
                    <input type="hidden" name="produto_id" value="<?= $produto->getId() ?>"> 
                    
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

                <!-- Badge exclusivo Black Friday para produto ID = 1 -->
                <?php if ($produto->getId() == 2): ?>
                    <div class="mt-3">
                        <div class="card border-warning">
                            <div class="card-body bg-warning bg-opacity-10">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-award-fill text-warning fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-1 fw-bold">Produto exclusivo Black Friday</h6>
                                        <p class="small mb-0">Oferta especial por tempo limitado</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Informacoes Adicionais -->
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
