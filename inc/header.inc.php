<body>
<?php
//--- AJOUT PANIER ---//
if(isset($_POST['add-basket'])) 
{ 
    $add = executeQuery("SELECT * FROM `products` WHERE `idProduct` = '$_POST[idProduct]'"); 
    $product = $add->fetch_assoc(); 
    addProductBasket($product['name'],$_POST['idProduct'],$_POST['quantity'],$product['price']);
}
//--- MISE A JOUR QUANTITÉ PANIER ---//
if(isset($_POST['more-one-basket'])) 
{
    updateProductQuantity($_POST['idProduct'], 1);
}
if(isset($_POST['less-one-basket'])) 
{
    updateProductQuantity($_POST['idProduct'], -1);
}
//--- VIDER PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "empty")
{
    unset($_SESSION['basket']);
    header("Location: home.php");
}
//--- VALIDATION DU PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "payment")
{
    for($i=0 ;$i < count($_SESSION['basket']['idProduct']) ; $i++)
    {
        
        $result = executeQuery("SELECT * FROM `products` WHERE `idProduct` = " . $_SESSION['basket']['idProduct'][$i]);
        $product = $result->fetch_assoc();
        if($product['stock'] < $_SESSION['basket']['stock'][$i])
        {
            $contenu .= "<hr><div>Stock Restant: {$product['stock']}</div>";
            $contenu .= "<div>Quantité demandée: {$_SESSION['basket']['stock'][$i]}</div>"; 
            if($product['stock'] > 0)
            {
                $contenu .= "<div>La quantité du produit :\"{$_SESSION['basket']['idProduct'][$i]}\" à été réduite car notre stock était insuffisant, veuillez vérifier vos achats.</div>";
                $_SESSION['basket']['stock'][$i] = $product['stock']; 
            }
            else
            {
                $contenu .= "<div>Le produit :\"{$_SESSION['basket']['idProduct'][$i]}\" à été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats.</div>"; 
                removeProductBasket($_SESSION['basket']['idProduct'][$i]); 
                $i--;
            }
            $erreur = true; 
        }
    } 
    if(!$erreur) 
    {
        header('Location: payment.php');
    }
}
?>
<header class="p-3">
    <div class="container header">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo RACINE_SITE; ?>home.php" class="d-flex align-items-center justify-content-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="<?php echo "{$line_footer['logo']}"; ?>">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'home.php') echo 'class="px-2 text-selected text-decoration-none"'; ?> href="<?php echo RACINE_SITE; ?>home.php" class="px-2 text-white text-decoration-none">Acceuil</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'class="px-2 text-selected text-decoration-none"'; ?> href="<?php echo RACINE_SITE; ?>shop.php" class="px-2 text-white text-decoration-none">Boutique</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="px-2 text-selected text-decoration-none"'; ?> href="<?php echo RACINE_SITE; ?>contact.php" class="px-2 text-white text-decoration-none">Contact</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'delivery.php') echo 'class="px-2 text-selected text-decoration-none"'; ?> href="<?php echo RACINE_SITE; ?>delivery.php" class="px-2 text-white text-decoration-none">Livraisons & Retours</a></li>
                <li><a <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="px-2 text-selected text-decoration-none"'; ?> href="<?php echo RACINE_SITE; ?>about.php" class="px-2 text-white text-decoration-none">A propos</a></li>
            </ul>
            <i class="bi bi-basket text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"></i>
        </div>
    </div>
</header>

<!--Panier-->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasWithBothOptions">
    <div class="offcanvas-header justify-content-end basket-close">
        <i class="bi bi-x-circle text-white" data-bs-dismiss="offcanvas"></i>
    </div>
    <div class="offcanvas-header justify-content-center basket-title">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">PANIER</h5>
    </div>
    <div class="d-flex align-items-center justify-content-center text-center">
    <?php
    if(empty($_SESSION['basket']['idProduct']))
    {
        echo '<div class="mt-5 pt-5">
                <p>Vous n\'avez pas de produit dans votre panier</p>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">CONTINUER MES ACHATS</button>
              </div>'; 
    } 
    else 
    {
        echo '<div><div class="basket-product">';
        for($i = 0; $i < count($_SESSION['basket']['idProduct']); $i++)
        {
            $id_product_basket = $_SESSION['basket']['idProduct'][$i]; // récupération du chemin de la photo pour l'afficher dans le panier
            $path_photo = executeQuery("SELECT photo FROM `products` WHERE idProduct = '$id_product_basket'");
            $id_product_basket_path_photo = $path_photo->fetch_assoc();
            $content_photo = $id_product_basket_path_photo['photo'];
            echo "<div class='card d-flex flex-row'>
                    <div class='w-50 m-3'><a class='text-decoration-none text-black' href='product.php?idProduct={$_SESSION['basket']['idProduct'][$i]}'><img src='$content_photo' width='100%' height='100%'></div>
                    <div class='card-body text-center w-50 d-flex justify-content-center flex-column'>
                        <p class='card-text'>{$_SESSION['basket']['name'][$i]}</p></a>
                        <p class='card-text'>{$_SESSION['basket']['price'][$i]} €</p>
                        <div class='d-flex justify-content-center'>
                            <form method='post'>
                                <input type='hidden' name='idProduct' value={$_SESSION['basket']['idProduct'][$i]}>
                                <button type='submit' name='more-one-basket'><i class='bi bi-plus-circle'></i></button>
                                <button type='submit' name='less-one-basket'><i class='bi bi-dash-circle mx-1'></i></button>
                            </form>
                        </div>                        
                        <p class='card-text'>Quantité : {$_SESSION['basket']['stock'][$i]}</p>
                    </div>
                  </div>";
        } 
        echo '</div>
              <div class="d-flex align-items-center justify-content-center flex-column text-center">
                <span>Total : ' . productsAmount() . ' €</span>
                <a href="' . RACINE_SITE . 'basket.php"><button type="button" class="btn btn-outline-dark btn-basket mt-3">CONSULTER LE PANIER</button></a>
                <a href="?action=payment"><button type="button" class="btn btn-outline-dark btn-basket my-1">FINALISER MA COMMANDE</button></a>
                <a href="?action=empty"><button type="button" class="btn btn-outline-dark btn-basket mb-1">VIDER LE PANIER</button></a>
                <p>En passant votre commande, vous acceptez <a href="' . RACINE_SITE . 'obligations.php">les conditions d\'utilisations</a></p>
              </div>
            </div>';
        }
    ?>
    </div>
</div>
<script>
//----------Responsive du panier dans le header (plus de menu, redirection vers la page "basket.php")
const basketIcon = document.querySelector('.bi-basket');
window.addEventListener('resize', function() 
{
    if (window.innerWidth <= 770) 
    {
        basketIcon.addEventListener('click', function() { window.location.href = '/eCommerce/basket.php'; });
        basketIcon.removeAttribute('data-bs-toggle');
        basketIcon.removeAttribute('data-bs-target');
        basketIcon.removeAttribute('aria-controls');
    } 
    else 
    {
        basketIcon.setAttribute('data-bs-toggle', 'offcanvas');
        basketIcon.setAttribute('data-bs-target', '#offcanvasWithBothOptions');
        basketIcon.setAttribute('aria-controls', 'offcanvasWithBothOptions');
        basketIcon.removeEventListener('click', function() { window.location.href = '/eCommerce/basket.php'; });
    }
});
</script>