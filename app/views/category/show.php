<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold"><?= htmlspecialchars($category['name']) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <?php if (!empty($segment)): ?>
                <li class="breadcrumb-item"><a href="/segment/<?= $segment['slug'] ?>" class="text-white-50"><?= htmlspecialchars($segment['name']) ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active text-white"><?= htmlspecialchars($category['name']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if ($category['description']): ?>
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <p class="lead text-muted"><?= htmlspecialchars($category['description']) ?></p>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="sidebar bg-light rounded-4 p-4">
                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled">
                        <?php if (!empty($allCategories)): foreach ($allCategories as $cat): ?>
                        <li class="mb-2">
                            <a href="/category/<?= $cat['slug'] ?>" class="text-decoration-none <?= $cat['id'] == $category['id'] ? 'fw-bold text-primary' : 'text-dark' ?>">
                                <?= htmlspecialchars($cat['name']) ?>
                            </a>
                        </li>
                        <?php endforeach; endif; ?>
                    </ul>
                    
                    <hr>
                    
                    <h5 class="fw-bold mb-3">Price Range</h5>
                    <form method="get" action="">
                        <div class="mb-3">
                            <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="<?= $_GET['min_price'] ?? '' ?>">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="<?= $_GET['max_price'] ?? '' ?>">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="mb-0"><?= count($products) ?> Products Found</p>
                    <select class="form-select" style="width: auto;" onchange="window.location.href=this.value">
                        <option value="?sort=newest" <?= ($_GET['sort'] ?? '') == 'newest' ? 'selected' : '' ?>>Newest First</option>
                        <option value="?sort=price_low" <?= ($_GET['sort'] ?? '') == 'price_low' ? 'selected' : '' ?>>Price: Low to High</option>
                        <option value="?sort=price_high" <?= ($_GET['sort'] ?? '') == 'price_high' ? 'selected' : '' ?>>Price: High to Low</option>
                        <option value="?sort=name" <?= ($_GET['sort'] ?? '') == 'name' ? 'selected' : '' ?>>Name A-Z</option>
                    </select>
                </div>
                
                <?php if (empty($products)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                    <h4>No products found</h4>
                    <p class="text-muted">Try adjusting your filters or browse other categories.</p>
                </div>
                <?php else: ?>
                <div class="row g-4">
                    <?php 
                    $productModel = new Product();
                    foreach ($products as $product): 
                        $img = $productModel->getPrimaryImage($product['id']);
                    ?>
                    <div class="col-md-4">
                        <div class="product-card card h-100 border-0 shadow-sm product-hover">
                            <div class="product-image-wrapper">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="card-img-top product-image">
                                <?php if ($product['is_new']): ?>
                                <span class="badge bg-success position-absolute top-0 start-0 m-2">New</span>
                                <?php endif; ?>
                                <div class="product-overlay">
                                    <a href="/product/<?= $product['slug'] ?>" class="btn btn-white btn-sm">View Details</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"><?= htmlspecialchars($product['name']) ?></h6>
                                <p class="text-muted small mb-2"><?= htmlspecialchars($product['size_text']) ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <?php if ($product['mrp'] > $product['selling_price']): ?>
                                        <span class="text-muted text-decoration-line-through small">₹<?= number_format($product['mrp']) ?></span>
                                        <?php endif; ?>
                                        <span class="fw-bold text-primary">₹<?= number_format($product['selling_price']) ?></span>
                                    </div>
                                    <button class="btn btn-primary btn-sm add-to-cart" data-product-id="<?= $product['id'] ?>">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
