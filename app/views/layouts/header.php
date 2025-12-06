<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Arofic Bathware - Premium Plumbing Solutions' ?></title>
    <meta name="description" content="<?= $metaDescription ?? 'Arofic Bathware - Premium quality bath fittings, sanitaryware, pipes, fittings, and water storage tanks.' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo.png" alt="Arofic Bathware" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Products</a>
                        <ul class="dropdown-menu">
                            <?php
                            $segmentModel = new Segment();
                            $menuSegments = $segmentModel->menuSegments();
                            foreach ($menuSegments as $seg): ?>
                            <li><a class="dropdown-item" href="/segment/<?= $seg['slug'] ?>"><?= htmlspecialchars($seg['name']) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dealer-enquiry">Become Dealer</a></li>
                </ul>
                <div class="nav-icons ms-3">
                    <a href="/search" class="btn btn-link"><i class="fas fa-search"></i></a>
                    <a href="/cart" class="btn btn-link position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count badge bg-primary" id="cartCount">0</span>
                    </a>
                    <?php if (Auth::check()): ?>
                    <a href="/account" class="btn btn-link"><i class="fas fa-user"></i></a>
                    <?php else: ?>
                    <a href="/login" class="btn btn-link"><i class="fas fa-user"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
    <?php if (Session::hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show m-0 rounded-0" role="alert">
        <?= Session::flash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
    
    <?php if (Session::hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show m-0 rounded-0" role="alert">
        <?= Session::flash('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
