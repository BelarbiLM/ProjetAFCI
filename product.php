<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';

if(isset($_GET['idProduct'])) 
{
  $result = executeQuery("SELECT * FROM `products` WHERE `idProduct` = {$_GET['idProduct']}"); 
} 

if($result->num_rows <= 0) 
{ 
  header("location:shop.php"); 
  exit(); 
}
$product = $result->fetch_assoc();
$suggestion = executeQuery("SELECT * FROM `products` ORDER BY RAND() LIMIT 3;"); 

$content .="<main class='product'>";
$content .="<div class='container py-4 my-5'>";
$content .="<a href='" . RACINE_SITE . "shop.php' class='link-dark'><i class='bi bi-arrow-return-left mx-2'></i>Retour dans la boutique</a>";
$content .="<div class='row align-items-md-stretch mt-5'>";
$content .="<div class='col-md-6'><div class='h-100 p-5 border rounded-3'><div><img src='{$product['photo']}' width='100%' height='100%'></div></div></div>";
$content .="<div class='col-md-6'><div class='h-100 p-5 rounded-3 product-description'>";
$content .="<h1 class='mb-4'>{$product['name']}</h1>";
$content .="<h4 class='mb-5'>{$product['sentence']}</h4>";
$content .="<ul class='mb-5'>";
if (!empty($product['strongPoint1'])) {$content .="<li>$product[strongPoint1]</li>";}
if (!empty($product['strongPoint2'])) {$content .="<li>$product[strongPoint2]</li>";}
if (!empty($product['strongPoint3'])) {$content .="<li>$product[strongPoint3]</li>";}
if (!empty($product['strongPoint4'])) {$content .="<li>$product[strongPoint4]</li>";}
$content .="</ul>";

if($product['stock'] > 0)
{
          $content .= "<i>Nombre de produit(s) disponible : {$product['stock']} </i>"; 
          $content .= '<form method="post"><div class="form-add-basket">';
            $content .= "<input type='hidden' name='idProduct' value='{$product['idProduct']}'>"; 
            $content .= "<p>{$product['price']} €</p>";
            $content .= '<div>';
              $content .= '<label for="quantity">Quantité : </label>';
              $content .= '<select id="quantity" name="quantity" class="ms-1">';
              for($i = 1; $i <= $product['stock'] && $i <= $product['stock']; $i++)
                {
                  $content .= "<option>$i</option>";
                }
              $content .= '</select>';
            $content .= '</div>';
            $content .= '<button type="submit" name="add-basket" class="btn btn-outline-success mt-3">Ajouter au panier</button>';
          $content .= '</div></form>'; 
}
else
{
        $content .= '<div class="h3 text-center text-danger"><ins>Rupture de stock !</ins></div>
                    <div class="text-center text-danger mb-5">Pour plus d\'informations sur la disponibilités d\'un produit veuillez contactez le <a href="' . RACINE_SITE . '/contact.php" class="text-danger">Service Client</a></div>';
}
        $content .= "<ul>
                      <li class='text-success'>Livraison Standard gratuite</li>
                      <li class='text-success'>Paiement CB ou Paypal</li>
                      <li class='text-success'>Expédition dans les 24h de la commande (jours ouvrés)</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class='product-description mb-4 rounded-3'>
                  <div class='container-fluid py-5'>
                    <p>{$product['text1']}</p>
                    <p>{$product['text2']}</p>
                    <p>{$product['text3']}</p>
                    <p>{$product['text4']}</p>
                    <p>{$product['text5']}</p>
                    <p>{$product['text6']}</p>
                  </div>
                </div>
                <div class='album py-5 bg-light'><div class='container'><h3 class='text-center text-decoration-underline'>Suggestion de produit :</h3><div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
                while($product_suggestion = $suggestion->fetch_assoc())
                {
                  $content .= "<div class='col'>
                                <div class='card shadow-sm'>
                                  <div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product_suggestion['idProduct']}'><img src={$product_suggestion['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>
                                  <div class='card-body text-center'>
                                    <p class='card-text'>{$product_suggestion['name']}</p></a>
                                    <p class='card-text'>{$product_suggestion['price']} €</p>
                                    <a href='product.php?idProduct={$product_suggestion['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>
                                  </div></div></div>";
                }
  $content .= "</div></div></div></div></main>";



echo $content;
include 'inc/footer.inc.php';
?>