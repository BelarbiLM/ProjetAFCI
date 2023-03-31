<body>
<div class="container-fluid">
<div class="row">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
<div class="position-sticky pt-3">

    <a href="<?php echo RACINE_SITE; ?>dashboard.php" class="aLogo d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto">
        <img src="inc/img/logo.png" alt="Logo" class="logo">
    </a>

    <hr class="opacity-100">

    <ul class="nav">
        <li class="nav-item">
        <a href="<?php echo RACINE_SITE; ?>dashboard.php" class="nav-link" aria-current="page">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span> 
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo RACINE_SITE; ?>order.php" class="nav-link">
            <i class="bi bi-grid"></i>
            <span>Orders</span>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo RACINE_SITE; ?>edit.php" class="nav-link">
            <i class="bi bi-table"></i>
            <span>Edit</span>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo RACINE_SITE; ?>support.php" class="nav-link">
            <i class="bi bi-chat-text"></i>
            <span>Support</span>
        </a>
        </li>
    </ul>

    <hr class="mb-5 opacity-100">

    <div class="dropdown d-flex justify-content-evenly align-items-center">
        <a href="signin.php"><button type="button" class="btn btn-outline-secondary mb-3">Déconnexion</button></a>
    </div>
    
</div>
</nav>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">