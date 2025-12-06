<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <?php if (!empty($product['segment_id'])): ?>
                <li class="breadcrumb-item"><a href="/segment/<?= $segment['slug'] ?? '' ?>"><?= htmlspecialchars($segment['name'] ?? 'Products') ?></a></li>
                <?php endif; ?>
                <?php if (!empty($category)): ?>
                <li class="breadcrumb-item"><a href="/category/<?= $category['slug'] ?>"><?= htmlspecialchars($category['name']) ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active"><?= htmlspecialchars($product['name']) ?></li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="product-gallery">
                    <div class="main-image mb-3">
                        <img src="<?= $primaryImage ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid rounded-4 shadow" id="mainProductImage">
                    </div>
                    <?php if (!empty($images) && count($images) > 1): ?>
                    <div class="thumbnail-images d-flex gap-2">
                        <?php foreach ($images as $img): ?>
                        <img src="<?= $img['image_path'] ?>" alt="" class="img-thumbnail product-thumb" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="product-details">
                    <?php if ($product['is_new']): ?>
                    <span class="badge bg-success mb-2">New Arrival</span>
                    <?php endif; ?>
                    <?php if ($product['is_featured']): ?>
                    <span class="badge bg-primary mb-2">Featured</span>
                    <?php endif; ?>
                    
                    <h1 class="h2 fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h1>
                    
                    <?php if ($product['article_code']): ?>
                    <p class="text-muted mb-2">Article Code: <?= htmlspecialchars($product['article_code']) ?></p>
                    <?php endif; ?>
                    
                    <?php if ($product['size_text']): ?>
                    <p class="text-muted mb-3">Size: <?= htmlspecialchars($product['size_text']) ?></p>
                    <?php endif; ?>
                    
                    <div class="price-box mb-4">
                        <?php if ($product['mrp'] > $product['selling_price']): ?>
                        <span class="text-muted text-decoration-line-through fs-5">₹<?= number_format($product['mrp'], 2) ?></span>
                        <span class="text-success ms-2 small"><?= round((($product['mrp'] - $product['selling_price']) / $product['mrp']) * 100) ?>% OFF</span>
                        <?php endif; ?>
                        <h2 class="text-primary fw-bold">₹<?= number_format($product['selling_price'], 2) ?></h2>
                        <small class="text-muted">Inclusive of all taxes</small>
                    </div>
                    
                    <p class="mb-4"><?= htmlspecialchars($product['short_description']) ?></p>
                    
                    <form id="addToCartForm" class="mb-4">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <label class="fw-bold">Quantity:</label>
                            <div class="input-group" style="width: 140px;">
                                <button type="button" class="btn btn-outline-secondary qty-minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="form-control text-center qty-input">
                                <button type="button" class="btn btn-outline-secondary qty-plus">+</button>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                            <a href="/checkout" class="btn btn-outline-primary btn-lg rounded-pill">Buy Now</a>
                        </div>
                    </form>
                    
                    <div class="product-features">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-truck text-primary me-3"></i>
                            <span>Free Delivery on orders above ₹5,000</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-shield-alt text-primary me-3"></i>
                            <span>10 Year Warranty</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-undo text-primary me-3"></i>
                            <span>Easy Returns & Exchange</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ($product['long_description']): ?>
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#specifications">Specifications</button>
                    </li>
                </ul>
                <div class="tab-content p-4 bg-light rounded-bottom">
                    <div class="tab-pane fade show active" id="description">
                        <?= $product['long_description'] ?>
                    </div>
                    <div class="tab-pane fade" id="specifications">
                        <table class="table">
                            <tr><th>Article Code</th><td><?= htmlspecialchars($product['article_code'] ?? '-') ?></td></tr>
                            <tr><th>SKU</th><td><?= htmlspecialchars($product['sku'] ?? '-') ?></td></tr>
                            <tr><th>Size</th><td><?= htmlspecialchars($product['size_text'] ?? '-') ?></td></tr>
                            <tr><th>Dimensions</th><td><?= htmlspecialchars($product['dimensions'] ?? '-') ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($relatedProducts)): ?>
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Related Products</h3>
                <div class="row g-4">
                    <?php 
                    $productModel = new Product();
                    foreach ($relatedProducts as $related): 
                        $img = $productModel->getPrimaryImage($related['id']);
                    ?>
                    <div class="col-md-3">
                        <div class="product-card card h-100 border-0 shadow-sm product-hover">
                            <div class="product-image-wrapper">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($related['name']) ?>" class="card-img-top product-image">
                                <div class="product-overlay">
                                    <a href="/product/<?= $related['slug'] ?>" class="btn btn-white btn-sm">View Details</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"><?= htmlspecialchars($related['name']) ?></h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-primary">₹<?= number_format($related['selling_price']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.querySelectorAll('.product-thumb').forEach(thumb => {
    thumb.addEventListener('click', function() {
        document.getElementById('mainProductImage').src = this.src;
    });
});

document.querySelector('.qty-minus')?.addEventListener('click', function() {
    const input = document.querySelector('.qty-input');
    if (input.value > 1) input.value--;
});

document.querySelector('.qty-plus')?.addEventListener('click', function() {
    const input = document.querySelector('.qty-input');
    input.value++;
});

document.getElementById('addToCartForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('/cart/add', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('Product added to cart!');
            location.reload();
        }
    });
});
</script>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
