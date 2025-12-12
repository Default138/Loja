<?php require __DIR__ . "/assets/elements/header.php"; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
            
            <!-- Ícone de carregamento animado -->
            <div class="mb-4">
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden">Carregando...</span>
                </div>
            </div>
            
            <!-- Mensagem principal -->
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="bi bi-cart-check"></i> Nosso Carrinho
            </h1>
            
            <!-- Subtítulo -->
            <p class="lead mb-4">
                Estamos preparando uma experiência incrível para você!
            </p>
            
            <!-- Card informativo -->
            <div class="card border-primary shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-tools text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Página em Construção</h5>
                             <p class="card-text text-muted mb-0">Estamos trabalhando duro para trazer o melhor carrinho de compras.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . "/assets/elements/footer.php"; ?>