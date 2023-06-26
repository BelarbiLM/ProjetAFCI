<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
//--- AJOUT PANIER ---//
if(isset($_POST['add-basket'])) 
{ 
    $add = executeQuery("SELECT * FROM `products` WHERE `idProduct` = '$_POST[idProduct]' "); 
    $product = $add->fetch_assoc(); 
    addProductBasket($product['name'], $_POST['idProduct'], $_POST['quantity'], $produit['price']);
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
}
//--- VALIDATION DU PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "payment")
{
    for($i=0 ;$i < count($_SESSION['basket']['idProduct']) ; $i++)
    {
        $result = executeQuery("SELECT * FROM `products` WHERE `idProduct`= " . $_SESSION['basket']['idProduct'][$i]);
        $product = $result->fetch_assoc();
        if($product['stock'] < $_SESSION['basket']['stock'][$i])
        {
            $content .= "<hr><div>Stock Restant: {$product['stock']}</div>";
            $content .= "<div>Quantité demandée: {$_SESSION['basket']['stock'][$i]}</div>"; 
            if($product['stock'] > 0)
            {
                $content .= "<div>La quantité du produit :\"{$_SESSION['basket']['idProduct'][$i]}\" à été réduite car notre stock était insuffisant, veuillez vérifier vos achats.</div>";
                $_SESSION['basket']['stock'][$i] = $product['stock']; 
            }
            else
            {
                $content .= "<div>Le produit :\"{$_SESSION['basket']['idProduct'][$i]}\" à été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats.</div>"; 
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
                <li><a href="<?php echo RACINE_SITE; ?>home.php" class="px-2 text-white text-decoration-none">Acceuil</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>shop.php" class="px-2 text-white text-decoration-none">Boutique</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>contact.php" class="px-2 text-white text-decoration-none">Contact</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>delivery.php" class="px-2 text-white text-decoration-none">Livraisons & Retours</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>about.php" class="px-2 text-white text-decoration-none">A propos</a></li>
            </ul>
        </div>
    </div>
</header>
<main class="basket">

    <div class="banner"><h2>Panier</h2></div>  
    
    <div class="basket-div d-flex">
        
        <div class="basket-zone-1">
            <h2 class="text-center">MON PANIER D'ACHATS</h2>
            
            <?php
            if(empty($_SESSION['basket']['idProduct']))
            {
            echo '<div class="basket-empty text-center mt-5 pt-5">
                    <p>Vous n\'avez pas de produit dans votre panier</p>
                    <a href="' . RACINE_SITE . 'shop.php"><button type="button" class="btn btn-outline-secondary">CONTINUER MES ACHATS</button></a>
                 </div> '; 
            } 
            else 
            {
            echo '<div class="basket-full mt-5 pt-5">
                    <h3 class="text-center mb-5">VOS PRODUITS</h3>
                    <div class="col basket-product">';
                    for($i = 0; $i < count($_SESSION['basket']['idProduct']); $i++)
                    {
                        $id_product_basket = $_SESSION['basket']['idProduct'][$i]; // récupération du chemin de la photo pour l'afficher dans le panier
                        $path_photo = executeQuery("SELECT photo FROM `products` WHERE idProduct = '$id_product_basket'");
                        $id_product_basket_path_photo = $path_photo->fetch_assoc();
                        $content_photo = $id_product_basket_path_photo['photo'];
                        echo '<div class="card">
                                <div class="w-50 m-3"><a class="text-decoration-none text-black" href="product.php?idProduct=' . $_SESSION['basket']['idProduct'][$i] . '"><img src="' . $content_photo . '" width="100%" height="100%"></div>
                                <div class="card-body text-center w-50 d-flex justify-content-center flex-column">
                                    <p class="card-text">' . $_SESSION['basket']['name'][$i] . '</p></a>
                                    <p class="card-text">' . $_SESSION['basket']['price'][$i] . ' €</p>
                                    <div class="d-flex justify-content-center">
                                        <form method="post">
                                            <input type="hidden" name="idProduct" value=' . $_SESSION['basket']['idProduct'][$i] . '>
                                            <button type="submit" name="more-one-basket"><i class="bi bi-plus-circle"></i></button>
                                            <button type="submit" name="less-one-basket"><i class="bi bi-dash-circle mx-1"></i></button>
                                        </form>
                                    </div>
                                    <p class="card-text">Quantité : ' . $_SESSION['basket']['stock'][$i] . '</p>
                                </div>
                              </div>';
                    }
              echo '</div>';
              echo $content;
              echo '<div class="d-flex flex-column align-items-center mt-5">
                        <a href="?action=payment"><button type="button" class="btn btn-outline-dark btn-basket my-1">FINALISER MA COMMANDE</button></a>
                        <a href="' . RACINE_SITE . 'shop.php"><button type="button" class="btn btn-outline-dark btn-basket my-1">RETOUR A LA BOUTIQUE</button></a>
                        <a href="?action=empty"><button type="button" class="btn btn-outline-dark btn-basket my-1">VIDER LE PANIER</button></a>
                        <p class="text-center">En passant votre commande, vous acceptez <a href="' . RACINE_SITE . 'obligations.php">les conditions d\'utilisations</a></p>
                    </div>
                 </div>';
            }
            ?>
        </div>


        <div class="basket-zone-2">
            <?php
            if(empty($_SESSION['basket']['idProduct']))
            {
            echo '<div class="basket-empty text-center m-5 py-5">
                    <p>Vous n\'avez pas de produit dans votre panier</p>
                    <a href="' . RACINE_SITE . 'shop.php"><button type="button" class="btn btn-outline-secondary">CONTINUER MES ACHATS</button></a>
                 </div> '; 
            } 
            else 
            {
            echo '<div>
                    <table class="table table-hover" cellpadding="10">
                        <tbody class="table-group-divider">
                            <tr>
                                <th>Sous-total</th>
                                <td> ' . productsAmount() . ' €</td>
                            </tr>
                            <tr>
                                <th>Livraison</th>
                                <td>Offerte</td>
                            </tr>
                            <tr>
                                <th>Taxes incluses</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot class="table-group-divider">
                            <tr>
                                <th>Total</th>
                                <td>-</td>
                            </tr>
                        </tfoot>
                    </table>  
                    <p class="table-detail">Total calculé après choix de la methode de livraison</p>  
                </div>
                <div class="basket-full text-center pt-5">
                    <a href="?action=payment"><button type="button" class="btn btn-outline-dark btn-basket my-3">FINALISER MA COMMANDE</button></a>
                    <p>En passant votre commande, vous acceptez <a href="' . RACINE_SITE . 'obligations.php">les conditions d\'utilisations</a></p>
                </div>';
            }
            ?>
            
            <div class="basket-service p-3 text-center">
                <h5>BESOIN D'AIDE ?</h5>
                <p>Le <a href="<?php echo RACINE_SITE; ?>contact.php">Service Client</a> est à votre disposition du lundi au dimanche de 9h à 20h.</p>
                <div class="d-flex align-items-center justify-content-center"><h5><i class="bi bi-credit-card"></i>  PAIEMENT 100 % SÉCURISÉ</h5></div>
                <p>Les données de votre carte bancaire sont envoyées de manière sécurisée. Toutes les informations sont protégées à l'aide de la technologie Secure Sockets Layer (SSL).</p>
            </div>        
        </div>
    </div>

</main>
<?php include 'inc/footer.inc.php';?>
