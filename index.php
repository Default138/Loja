<?php 
require __DIR__ . "/assets/elements/header.php"; 
require_once ("DAO/ProdutoDao.php");

$ProdutoDao = new ProdutoDao;
$produtos = $ProdutoDao->listar();
?>

<!-- ALERTA BLACK FRIDAY -->
<div class="alert alert-danger alert-dismissible fade show rounded-0 mb-0" role="alert" style="background: linear-gradient(135deg, #000000, #ff4444); color: white; border: none;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <i class="bi bi-lightning-fill me-3 fs-4"></i>
            <div>
                <h5 class="mb-0 fw-bold">BLACK FRIDAY EXCLUSIVA!</h5>
                <p class="mb-0">Até 70% OFF em toda a loja + FRETE GRÁTIS em compras acima de R$ 99</p>
            </div>
        </div>
        <a href="produtos.php?promocao=blackfriday" class="btn btn-light btn-sm fw-bold">
            APROVEITAR <i class="bi bi-arrow-right ms-1"></i>
        </a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<section class="slideshow">
    <div class="container">
        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://lipsum.app/1109x180" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://lipsum.app/1109x180.jpg" class="d-block w-100" alt="">
                </div>
            </div>
            <!-- /.carousel-inner -->

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</section>
<!-- /.slideshow -->

<section class="banners mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://lipsum.app/541x105" class="d-block w-100" alt="">
            </div>
            <div class="col-md-6">
                <img src="https://lipsum.app/541x105" class="d-block w-100" alt="">
            </div>
        </div>
    </div>
</section>
<!-- /.banners -->

<section class="mais-populares mt-5 text-center">
    <div class="container">
        <h2>Mais populares</h2>
    </div>
</section>
<!-- /.mais-populares -->

<main class="produtos">
    <div class="container">
        <div class="row">
            <?php foreach ($produtos as $produto): ?>
                <!-- Produto -->
                <div class="col-md-3 mb-4">
                    <div class="card card-produto rounded-0 border-0 h-100 position-relative">
                        <!-- Badges para produto ID = 1 -->
                        <?php if ($produto->getId() == 1): ?>
                            <div class="position-absolute top-0 end-0 mt-2 me-2">
                                <span class="badge bg-warning text-dark rounded-pill fs-7 px-3 py-2">
                                    <i class="bi bi-lightning-fill me-1"></i> -30%
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <a href="produto.php?id=<?php echo $produto->getId(); ?>">
                            <img src="<?php echo htmlspecialchars($produto->getImagem()); ?>" 
                                 class="card-img-top rounded-0" 
                                 alt="<?php echo htmlspecialchars($produto->getNome()); ?>">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="produto.php?id=<?php echo $produto->getId(); ?>" 
                                   class="text-decoration-none text-dark">
                                    <?php echo htmlspecialchars($produto->getNome()); ?>
                                </a>
                            </h5>
                            <div class="mt-auto">
                                <?php if ($produto->getId() == 1): ?>
                                    <!-- Preço com desconto para produto ID = 1 -->
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
                                    </div>
                                    <small class="text-success">
                                        <i class="bi bi-truck"></i> Frete grátis
                                    </small>
                                <?php else: ?>
                                    <!-- Preço normal para outros produtos -->
                                    <p class="card-text fw-bold fs-5">
                                        R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?>
                                    </p>
                                <?php endif; ?>
                                
                                <!-- Badge de estoque limitado para produto ID = 1 -->
                                <?php if ($produto->getId() == 1): ?>
                                    <div class="mt-2">
                                        <span class="badge bg-info text-dark">
                                            <i class="bi bi-exclamation-triangle-fill me-1"></i> Últimas unidades
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Badge exclusivo no rodapé do card -->
                        <?php if ($produto->getId() == 1): ?>
                            <div class="card-footer bg-light border-0">
                                <small class="text-muted d-flex align-items-center">
                                    <i class="bi bi-award-fill text-warning me-2"></i>
                                    <span class="fw-bold">Produto exclusivo Black Friday</span>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /Produto -->
            <?php endforeach; ?>
        </div>
        <!-- /.row -->
    </div>
</main>
<!-- /.produtos -->

<section class="container veja-mais">
    <div class="d-flex justify-content-center my-5">
        <a href="produtos.php?promocao=blackfriday" class="btn btn-lg btn-danger text-uppercase rounded-pill px-5 py-3 fw-bold">
            <i class="bi bi-lightning-fill me-2"></i> VER OFERTAS BLACK FRIDAY
        </a>
    </div>
</section>
<!-- /.veja-mais -->

<?php require __DIR__ . "/assets/elements/footer.php"; ?>