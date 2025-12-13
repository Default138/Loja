<?php 
require __DIR__ . "/assets/elements/header.php"; 
require_once ("DAO/ProdutoDao.php");

$ProdutoDao = new ProdutoDao;
$produtos = $ProdutoDao->listar();
?>

<main class="produtos-lista">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 mb-4">Nossos Produtos</h1>
            </div>
        </div>

        <div class="row">
            <!-- Filtros -->
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filtros</h5>
                        
                        <!-- Categorias -->
                        <div class="mb-3">
                            <h6>Categorias</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat-casual">
                                <label class="form-check-label" for="cat-casual">Moda Casual</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat-praia">
                                <label class="form-check-label" for="cat-praia">Moda Praia</label>
                            </div>
                        </div>

                        <!-- Preço -->
                        <div class="mb-3">
                            <h6>Preço</h6>
                            <input type="range" class="form-range" min="0" max="500" step="10">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de Produtos -->
            <div class="col-lg-9">
                <div class="row">
                    <?php foreach($produtos as $produto): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 produto-card">
                            <img src="<?= $produto->getImagem() ?>" class="card-img-top" alt="<?= $produto->getNome() ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $produto->getNome() ?></h5>

                                <!-- Preço -->
                                <p class="card-text price h5 text-primary mb-3">
                                    R$ <?= number_format($produto->getPreco(), 2, ',', '.') ?>
                                </p>

                                <!-- Botão -->
                                <a href="produto.php?id=<?php echo $produto->getId()?>" class="btn btn-outline-primary mt-auto">Ver Detalhes</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . "/assets/elements/footer.php"; ?>