<?php require __DIR__ . "/assets/elements/header.php"; 
require_once ("DAO/ProdutoDao.php");

$ProdutoDao = new ProdutoDao;
$produtos = $ProdutoDao->listar();
?>

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
                    <div class="col-md-3">
                        <div class="card card-produto rounded-0 border-0">
                            <a href="produto.php?id=<?php echo $produto->getId(); ?>">
                                <img src="<?php echo htmlspecialchars($produto->getImagem()); ?>" class="card-img-top rounded-0" alt="<?php echo htmlspecialchars($produto->getNome()); ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="produto.php?id=<?php echo $produto->getId(); ?>" class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($produto->getNome()); ?>
                                    </a>
                                </h5>
                                <p class="card-text">R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></p>
                            </div>
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
        <div class="btn btn-lg btn-warning text-uppercase rounded-pill px-4">veja mais</div>
    </div>
</section>
<!-- /.veja-mais -->

<?php require __DIR__ . "/assets/elements/footer.php"; ?>