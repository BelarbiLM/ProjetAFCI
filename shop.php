<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$result = executeQuery("SELECT * FROM `editShop`");
$line2 = $result->fetch_assoc();
$data_product = executeQuery("SELECT * FROM `products`");
$data_product_recent = executeQuery("SELECT * FROM `products` ORDER BY dateEdit ASC");
$data_product_more = executeQuery("SELECT * FROM `products` ORDER BY price ASC");
$data_product_less = executeQuery("SELECT * FROM `products` ORDER BY price DESC");$action = isset($_GET['action']) ? $_GET['action'] : '';
// Dans ce code, nous utilisons isset($_GET['action']) pour vérifier si la variable action est définie dans la chaîne de requête de l'URL, puis nous utilisons $action = $_GET['action'] pour obtenir sa valeur. Ensuite, nous utilisons simplement des instructions if / else pour définir la variable $selected appropriée pour chaque option. Enfin, nous utilisons $baseSelected = 'selected' pour définir l'option "Filtrer par" comme sélectionnée si aucune valeur d'action n'est définie dans la chaîne de requête de l'URL.
$baseSelected = '';
$recentSelected = '';
$moreSelected = '';
$lessSelected = '';
if ($action == 'recent') { $recentSelected = 'selected'; } else { $recentSelected = ''; }
if ($action == 'more') { $moreSelected = 'selected'; } else { $moreSelected = ''; }
if ($action == 'less') { $lessSelected = 'selected'; } else { $lessSelected = ''; }
if ($action == '') { $baseSelected = 'selected'; } else { $baseSelected = ''; }

$content .= "<p class='text-muted'>{$line2['text1']}</p>";
$content .= "<p class='text-muted'>{$line2['text2']}</p>";
$content .= "<p class='text-muted'>{$line2['text3']}</p>";
$content .= "<p class='text-muted'>{$line2['text4']}</p>";
$content .= "</div></div></section>";
$content .="<div class='d-flex flex-wrap justify-content-center my-3'>
              <p class='m-1'>Tri :</p>
              <select class='form-select mx-3' onchange='location = this.value;'>
                <option value='?action=' $baseSelected>Filtrer par</option>
                <option value='?action=recent' $recentSelected>Le plus récent</option>
                <option value='?action=more' $moreSelected>Prix (croissant)</option>
                <option value='?action=less' $lessSelected>Prix (décroissant)</option>
              </select>
            </div>";
$content .= '<div class="album py-5 bg-light"><div class="container"><div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">'; 

if(isset($_GET['action']) && $_GET['action'] == 'recent') {
  while($product = $data_product_recent->fetch_assoc())
  {
    $content .= '<div class="col">';
    $content .= '<div class="card shadow-sm">';
    $content .= "<div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product['idProduct']}'><img src={$product['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>";
    $content .= '<div class="card-body text-center">';
    $content .= "<p class='card-text'>{$product['name']}</p></a>";
    $content .= "<p class='card-text'>{$product['price']} €</p>";
    $content .= "<a href='product.php?idProduct={$product['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>";
    $content .= '</div></div></div>';
  } 
}
elseif(isset($_GET['action']) && $_GET['action'] == 'more') {
  while($product = $data_product_more->fetch_assoc())
  {
    $content .= '<div class="col">';
    $content .= '<div class="card shadow-sm">';
    $content .= "<div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product['idProduct']}'><img src={$product['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>";
    $content .= '<div class="card-body text-center">';
    $content .= "<p class='card-text'>{$product['name']}</p></a>";
    $content .= "<p class='card-text'>{$product['price']} €</p>";
    $content .= "<a href='product.php?idProduct={$product['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>";
    $content .= '</div></div></div>';
  } 
}
elseif(isset($_GET['action']) && $_GET['action'] == 'less') {
  while($product = $data_product_less->fetch_assoc())
  {
    $content .= '<div class="col">';
    $content .= '<div class="card shadow-sm">';
    $content .= "<div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product['idProduct']}'><img src={$product['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>";
    $content .= '<div class="card-body text-center">';
    $content .= "<p class='card-text'>{$product['name']}</p></a>";
    $content .= "<p class='card-text'>{$product['price']} €</p>";
    $content .= "<a href='product.php?idProduct={$product['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>";
    $content .= '</div></div></div>';
  } 
}
elseif(isset($_GET['action']) && $_GET['action'] == 'base') {
  while($product = $data_product->fetch_assoc())
  {
    $content .= '<div class="col">';
    $content .= '<div class="card shadow-sm">';
    $content .= "<div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product['idProduct']}'><img src={$product['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>";
    $content .= '<div class="card-body text-center">';
    $content .= "<p class='card-text'>{$product['name']}</p></a>";
    $content .= "<p class='card-text'>{$product['price']} €</p>";
    $content .= "<a href='product.php?idProduct={$product['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>";
    $content .= '</div></div></div>';
  } 
}
else {
  while($product = $data_product->fetch_assoc())
  {
    $content .= '<div class="col">';
    $content .= '<div class="card shadow-sm">';
    $content .= "<div class='bd-placeholder-img card-img-top' width='100%' height='225'><a class='text-decoration-none text-black' href='product.php?idProduct={$product['idProduct']}'><img src={$product['photo']} width='80%' height='80%' class='mt-3 m-auto d-flex'></div>";
    $content .= '<div class="card-body text-center">';
    $content .= "<p class='card-text'>{$product['name']}</p></a>";
    $content .= "<p class='card-text'>{$product['price']} €</p>";
    $content .= "<a href='product.php?idProduct={$product['idProduct']}'><button type='submit' class='btn btn-outline-success mt-3'>Plus de détails</button></a>";
    $content .= '</div></div></div>';
  } 
}

$content .= '</div></div></div>';
?>

<main class="shop">
  <section class="text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 w-100">
        <h1 class="fw-light my-5">Notre Boutique</h1>
        <?php echo $content; ?>
</main>
<?php include 'inc/footer.inc.php';?>

  