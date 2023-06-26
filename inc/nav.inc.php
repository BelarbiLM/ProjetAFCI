<?php
//--- VERIFICATION ADMIN ---//
if(!coAdmin()) { 
    header ("location: signin.php"); 
    exit;
}
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <a href="<?php echo RACINE_SITE; ?>dashboard.php" class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto">
                        <img src="<?php echo "{$line_footer['logo']}"; ?>">
                    </a>
                    <hr class="opacity-100">
                    <ul class="nav">
                        <li class="nav-item">
                        <a <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'class="nav-link text-primary"'; ?> href="<?php echo RACINE_SITE; ?>dashboard.php" class="nav-link">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span> 
                        </a>
                        </li>
                        <li class="nav-item">
                        <a <?php if(basename($_SERVER['PHP_SELF']) == 'order.php') echo 'class="nav-link text-primary"'; ?> href="<?php echo RACINE_SITE; ?>order.php" class="nav-link">
                            <i class="bi bi-grid"></i>
                            <span>Commandes</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a <?php if(basename($_SERVER['PHP_SELF']) == 'edit.php' || basename($_SERVER['PHP_SELF']) == 'editHome.php' || basename($_SERVER['PHP_SELF']) == 'editAbout.php' || basename($_SERVER['PHP_SELF']) == 'editShop.php' || basename($_SERVER['PHP_SELF']) == 'editContact.php' || basename($_SERVER['PHP_SELF']) == 'editGlobal.php' || basename($_SERVER['PHP_SELF']) == 'editDelivery.php' || basename($_SERVER['PHP_SELF']) == 'editObligations.php' || basename($_SERVER['PHP_SELF']) == 'editProduct.php' || basename($_SERVER['PHP_SELF']) == 'editFooter.php') echo 'class="nav-link text-primary"'; ?> href="<?php echo RACINE_SITE; ?>edit.php" class="nav-link">
                            <i class="bi bi-table"></i>
                            <span>Edit</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a <?php if(basename($_SERVER['PHP_SELF']) == 'support.php') echo 'class="nav-link text-primary"'; ?> href="<?php echo RACINE_SITE; ?>support.php" class="nav-link">
                            <i class="bi bi-chat-text"></i>
                            <span>Support</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a <?php if(basename($_SERVER['PHP_SELF']) == 'register.php') echo 'class="nav-link text-primary"'; ?> href="<?php echo RACINE_SITE; ?>register.php" class="nav-link">
                            <i class="bi bi-file-earmark-person"></i>
                            <span>Inscription</span>
                        </a>
                        </li>
                    </ul>
                    <hr class="opacity-100">
                    <div class="dropdown d-flex justify-content-evenly align-items-center">
                        <?php echo '<a href="' . RACINE_SITE . 'signin.php?action=logout"><button type="button" class="btn btn-outline-secondary mb-3">Déconnexion</button></a>';?>
                    </div>
                </div>
            </nav>    
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">