<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="hero-section">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php if (!empty($sliders)): foreach ($sliders as $slider): ?>
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(135deg, #1a365d 0%, #2563eb 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-6 hero-content">
                                <h1 class="display-4 fw-bold text-white mb-3 animate-fade-in"><?= htmlspecialchars($slider['title']) ?></h1>
                                <p class="lead text-white-50 mb-4"><?= htmlspecialchars($slider['subtitle']) ?></p>
                                <p class="text-white mb-4"><?= $slider['description'] ?></p>
                                <?php if ($slider['cta_text']): ?>
                                <a href="<?= $slider['cta_link'] ?>" class="btn btn-light btn-lg px-5 rounded-pill"><?= htmlspecialchars($slider['cta_text']) ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 hero-image-container">
                                <?php if ($slider['image_path']): ?>
                                <img src="<?= $slider['image_path'] ?>" alt="<?= htmlspecialchars($slider['title']) ?>" class="hero-image img-fluid floating-animation">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(135deg, #1a365d 0%, #2563eb 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-6 hero-content">
                                <h1 class="display-4 fw-bold text-white mb-3">Premium Bathware Solutions</h1>
                                <p class="lead text-white-50 mb-4">Transform Your Bathroom</p>
                                <p class="text-white mb-4">Experience luxury with Arofic premium range of bath fittings, sanitaryware, and designer collections.</p>
                                <a href="/segment/designer-collection" class="btn btn-light btn-lg px-5 rounded-pill">Explore Collection</a>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="hero-3d-frame">
                                    <img src="/assets/images/logo.png" alt="Arofic" class="img-fluid floating-animation" style="max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">About Arofic</h2>
            <p class="text-muted">Established in 1995 | Trusted by 100,000+ Customers</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <p class="lead">AROFIC brand came into existence in 2014 and has since grown to become a leading name in the plumbing industry.</p>
                <p>All products under AROFIC are manufactured using superior quality raw materials and are constantly tested by the team of experts. We have developed a controlled quality management system which places great prominence towards providing finest quality.</p>
                <a href="/about" class="btn btn-primary rounded-pill px-4">Learn More</a>
            </div>
            <div class="col-lg-6">
                <div class="stats-grid">
                    <div class="stat-card text-center p-4 bg-white rounded-4 shadow-sm">
                        <h2 class="counter fw-bold text-primary" data-count="200">200+</h2>
                        <p class="mb-0">Channel Partners</p>
                    </div>
                    <div class="stat-card text-center p-4 bg-white rounded-4 shadow-sm">
                        <h2 class="counter fw-bold text-primary" data-count="100000">100,000+</h2>
                        <p class="mb-0">Happy Customers</p>
                    </div>
                    <div class="stat-card text-center p-4 bg-white rounded-4 shadow-sm">
                        <h2 class="counter fw-bold text-primary" data-count="30">30+</h2>
                        <p class="mb-0">Years Experience</p>
                    </div>
                    <div class="stat-card text-center p-4 bg-white rounded-4 shadow-sm">
                        <h2 class="counter fw-bold text-primary" data-count="1000">1000+</h2>
                        <p class="mb-0">Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Product Range</h2>
            <p class="text-muted">Complete Plumbing Solutions</p>
        </div>
        <div class="row g-4">
            <?php if (!empty($segments)): foreach ($segments as $segment): ?>
            <div class="col-md-4 col-lg-2">
                <a href="/segment/<?= $segment['slug'] ?>" class="segment-card text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center segment-hover">
                        <div class="card-body py-4">
                            <div class="segment-icon mb-3">
                                <i class="fas <?= $segment['icon'] ?: 'fa-box' ?> fa-2x text-primary"></i>
                            </div>
                            <h6 class="card-title mb-0"><?= htmlspecialchars($segment['name']) ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Shop by Category</h2>
            <p class="opacity-75">Browse Our Collections</p>
        </div>
        <div class="row g-4">
            <?php if (!empty($categories)): foreach (array_slice($categories, 0, 8) as $category): ?>
            <div class="col-md-4 col-lg-3">
                <a href="/category/<?= $category['slug'] ?>" class="text-decoration-none">
                    <div class="category-card bg-white rounded-4 p-4 text-center h-100 shadow category-hover">
                        <?php if ($category['image_path']): ?>
                        <img src="<?= $category['image_path'] ?>" alt="<?= htmlspecialchars($category['name']) ?>" class="category-img mb-3">
                        <?php else: ?>
                        <div class="category-placeholder mb-3"><i class="fas fa-image fa-3x text-muted"></i></div>
                        <?php endif; ?>
                        <h6 class="text-dark mb-0"><?= htmlspecialchars($category['name']) ?></h6>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Featured Products</h2>
            <p class="text-muted">Handpicked for You</p>
        </div>
        <div class="swiper products-swiper">
            <div class="swiper-wrapper">
                <?php 
                $productModel = new Product();
                if (!empty($featuredProducts)): foreach ($featuredProducts as $product): 
                    $image = $productModel->getPrimaryImage($product['id']);
                ?>
                <div class="swiper-slide">
                    <div class="product-card card h-100 border-0 shadow-sm product-hover">
                        <div class="product-image-wrapper">
                            <img src="<?= $image ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="card-img-top product-image">
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
                                    <span class="text-muted text-decoration-line-through small">₹<?= number_format($product['mrp']) ?></span>
                                    <span class="fw-bold text-primary">₹<?= number_format($product['selling_price']) ?></span>
                                </div>
                                <button class="btn btn-primary btn-sm add-to-cart" data-product-id="<?= $product['id'] ?>">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-4">Designer Collection 2025</h2>
                <p class="lead mb-4">Explore our exclusive designer collection featuring artistic wash basins and premium faucets for the modern home.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Premium Quality Materials</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Elegant Modern Designs</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> 10 Year Warranty</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Easy Installation</li>
                </ul>
                <a href="/segment/designer-collection" class="btn btn-primary btn-lg rounded-pill px-5">View Collection</a>
            </div>
            <div class="col-lg-6">
                <div class="iphone-frame mx-auto">
                    <div class="iphone-notch"></div>
                    <div class="iphone-screen">
                        <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
                            <source src="/assets/videos/designer.mp4" type="video/mp4">
                            <img src="/assets/images/logo.png" alt="Arofic Designer Collection">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-4">
                <h2 class="fw-bold mb-4">Water Storage Tanks</h2>
                <p class="lead mb-4">Durable water storage tanks with 3 to 10 layer technology. Food grade material for safe water storage.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-shield-alt text-primary me-2"></i> Multi-Layer Protection</li>
                    <li class="mb-2"><i class="fas fa-leaf text-primary me-2"></i> Food Grade Material</li>
                    <li class="mb-2"><i class="fas fa-sun text-primary me-2"></i> UV Stabilized</li>
                    <li class="mb-2"><i class="fas fa-award text-primary me-2"></i> Up to 10 Year Warranty</li>
                </ul>
                <a href="/segment/water-tanks" class="btn btn-primary btn-lg rounded-pill px-5">Explore Tanks</a>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="tv-frame mx-auto">
                    <div class="tv-screen">
                        <div class="tv-content text-center p-5">
                            <h3 class="text-white fw-bold">AROFIC</h3>
                            <p class="text-white-50">Premium Water Storage</p>
                        </div>
                    </div>
                    <div class="tv-stand"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-4">Visit Arofic Store</h2>
                <p class="lead mb-4">Experience our complete range of products at our store. Expert guidance and best prices guaranteed.</p>
                <p class="mb-4">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                    Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India
                </p>
                <p class="mb-4">
                    <i class="fas fa-phone text-primary me-2"></i>
                    +91 99961 00970
                </p>
                <a href="/contact" class="btn btn-primary btn-lg rounded-pill px-5">Contact Us</a>
            </div>
            <div class="col-lg-6">
                <div class="shop-frame">
                    <div class="shop-header">
                        <span class="shop-name">AROFIC</span>
                    </div>
                    <div class="shop-content">
                        <img src="/assets/images/logo.png" alt="Arofic Store" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Arofic</h2>
            <p class="text-muted">Quality You Can Trust</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="usp-card text-center p-4">
                    <div class="usp-icon mb-3">
                        <i class="fas fa-medal fa-3x text-primary"></i>
                    </div>
                    <h5>Premium Quality</h5>
                    <p class="text-muted small">Superior quality raw materials tested by experts</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="usp-card text-center p-4">
                    <div class="usp-icon mb-3">
                        <i class="fas fa-certificate fa-3x text-primary"></i>
                    </div>
                    <h5>Warranty</h5>
                    <p class="text-muted small">Up to 10 years warranty on products</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="usp-card text-center p-4">
                    <div class="usp-icon mb-3">
                        <i class="fas fa-truck fa-3x text-primary"></i>
                    </div>
                    <h5>Pan India Delivery</h5>
                    <p class="text-muted small">200+ channel partners across India</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="usp-card text-center p-4">
                    <div class="usp-icon mb-3">
                        <i class="fas fa-headset fa-3x text-primary"></i>
                    </div>
                    <h5>Expert Support</h5>
                    <p class="text-muted small">Dedicated customer support team</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Customer Reviews</h2>
            <p class="text-muted">What Our Customers Say</p>
        </div>
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <?php if (!empty($testimonials)): foreach ($testimonials as $testimonial): ?>
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100">
                        <div class="stars mb-3">
                            <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                            <i class="fas fa-star text-warning"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="mb-4">"<?= htmlspecialchars($testimonial['message']) ?>"</p>
                        <div class="d-flex align-items-center">
                            <div class="testimonial-avatar me-3">
                                <i class="fas fa-user-circle fa-3x text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0"><?= htmlspecialchars($testimonial['name']) ?></h6>
                                <small class="text-muted"><?= htmlspecialchars($testimonial['designation']) ?>, <?= htmlspecialchars($testimonial['company']) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted">Get Your Answers</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php if (!empty($faqs)): $i = 0; foreach ($faqs as $faq): $i++; ?>
                    <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $i > 1 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $faq['id'] ?>">
                                <?= htmlspecialchars($faq['question']) ?>
                            </button>
                        </h2>
                        <div id="faq<?= $faq['id'] ?>" class="accordion-collapse collapse <?= $i == 1 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?= $faq['answer_html'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <div class="text-center mt-4">
                    <a href="/faq" class="btn btn-outline-primary rounded-pill px-4">View All FAQs</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Find Us</h2>
            <p class="text-muted">Visit Our Store</p>
        </div>
        <div class="map-container rounded-4 overflow-hidden shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.5!2d75.0!3d29.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sSirsa%2C%20Haryana!5e0!3m2!1sen!2sin!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">Become an Arofic Dealer</h3>
                <p class="mb-0 opacity-75">Join our growing network of 200+ dealers across India. Partner with a trusted brand.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="/dealer-enquiry" class="btn btn-light btn-lg rounded-pill px-5">Apply Now</a>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
