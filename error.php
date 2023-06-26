<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
?>
<a href="<?php echo RACINE_SITE; ?>home.php" class=' text-black text-decoration-none'>
<header class="error-404-header">
    <img src="<?php echo "{$line_footer['logo']}"; ?>">     
</header>
<body class="error-404">
    <div>
        <h1>404</h1>
        <h2>La page que vous voulez affichez n'éxiste pas ou plus.</h2> 
        <h2>Pas de panique nous pouvons vous redirigez vers l'acceuil, cliquez n'importe ou.</h2>
    </div>
</body>
</a>
</html>