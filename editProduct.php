<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';
//--- LIENS ---//
$content .= '<div class="d-flex flex-column mt-3"><a href="?action=display" class="liens-produits m-auto text-decoration-none text-dark">Affichage des produits</a>'; 
$content .= '<a href="?action=add" class="m-auto text-decoration-none text-dark">Ajout d\'un produit</a></div><hr>'; 
//--- AFFICHAGE ---//
if(isset($_GET['action']) && $_GET['action'] == "display") {
    $result = executeQuery("SELECT * FROM `products`");
    $content .= '<h4 class="justify-content-center mb-3">Affichage des Produits</h4>';
    $content .= 'Nombre de produit(s) dans la boutique : ' . $result->num_rows; 
    $content .= '<div class="album py-5 bg-light"><div class="container"><div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    while ($line = $result->fetch_assoc())
    {
        $content .= '<div class="col">';
        $content .= '<div class="card shadow-sm">';
        $content .= "<img src='{$line['photo']}' width ='180' height='180' class='mt-3 m-auto'>";
        $content .= '<div class="card-body text-center">';
        $content .= "<p class='card-text'>{$line['reference']}</p>";
        $content .= "<p class='card-text'>{$line['name']}</p>";
        $content .= "<p class='card-text'>{$line['stock']}</p>";
        $content .= "<p class='card-text'>{$line['price']} €</p>";
        $content .= "<a href='?action=change&idProduct={$line['idProduct']}'><button type='submit' class='btn btn-secondary mt-3 me-3'>Modifier</button></a>";
        $content .= "<a href='?action=delete&idProduct={$line['idProduct']}' OnClick='return(confirm(\'En êtes vous certain ?\'));'><button type='submit' class='btn btn-secondary mt-3'>Supprimer</button></a>";
        $content .= '</div></div></div>';
    }
    $content .= '</div></div></div>'; 
}
//--- SUPPRESSION ---//
if(isset($_GET['action']) && $_GET['action'] == "delete") 
{ 
    $result = executeQuery("SELECT * FROM `products` WHERE `idProduct` = '$_GET[idProduct]'");
    $delete_product = $result->fetch_assoc();
    $delete_road_file = $_SERVER['DOCUMENT_ROOT'] . $delete_product['photo']; 

    if(!empty($delete_product['photo']) && file_exists($delete_road_file)) unlink($delete_road_file); 

    executeQuery("DELETE FROM `products` WHERE `idProduct` = '$_GET[idProduct]'");
    $content .= "<div class='requete-valid d-flex justify-content-center align-items-center'>Suppression du produit : {$_GET['idProduct']}</div>";
    $_GET['action'] = 'display'; 
}

//--- ENREGISTREMENT ---//
if(!empty($_POST))
{
    $photo_bdd = ""; 

    if(isset($_GET['action']) && $_GET['action'] == 'change')
    {
        $photo_bdd = $_POST['photoCurrent'];
    }

    if(!empty($_FILES['photo']['name'])) 
    { 
        $photo_name = $_POST['reference'] . '_' .$_FILES['photo']['name'];
        $photo_bdd = RACINE_SITE . "photo/$photo_name";
        $photo_file = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$photo_name"; 
        copy($_FILES['photo']['tmp_name'],$photo_file);
    }

    foreach($_POST as $index => $value)
    {
        $_POST[$index] = htmlEntities(addSlashes($value));
        $_POST[$index] = htmlspecialchars($value, ENT_QUOTES);
    }
    executeQuery("INSERT INTO `products` (`dateEdit`, `reference`, `name`, `sentence`, `strongPoint1`, `strongPoint2`, `strongPoint3`, `strongPoint4`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `photo`, `price`, `stock`, `caroussel`, `bestsellers`) VALUES (NOW(), '$_POST[reference]', '$_POST[name]', '$_POST[sentence]', '$_POST[strongPoint1]', '$_POST[strongPoint2]', '$_POST[strongPoint3]', '$_POST[strongPoint4]', '$_POST[text1]', '$_POST[text2]', '$_POST[text3]', '$_POST[text4]', '$_POST[text5]', '$_POST[text6]', '$photo_bdd', '$_POST[price]', '$_POST[stock]', '$_POST[caroussel]', '$_POST[bestsellers]') ON DUPLICATE KEY UPDATE `reference` = '$_POST[reference]', `name` = '$_POST[name]', `sentence` = '$_POST[sentence]', `strongPoint1` = '$_POST[strongPoint1]', `strongPoint2` = '$_POST[strongPoint2]', `strongPoint3` = '$_POST[strongPoint3]', `strongPoint4` = '$_POST[strongPoint4]', `text1` = '$_POST[text1]', `text2` = '$_POST[text2]', `text3` = '$_POST[text3]', `text4` = '$_POST[text4]', `text5` = '$_POST[text5]', `text6` = '$_POST[text6]', `photo` = '$photo_bdd', `price` = '$_POST[price]', `stock` = '$_POST[stock]', `caroussel` = '$_POST[caroussel]', `bestsellers` = '$_POST[bestsellers]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display'; 
}
?>
<div class="col-12 input-group pt-3 pb-2 mb-3 border-bottom">
    <select class="form-select" onchange="window.location.href=this.value;">
        <option value="">Choisir une option</option>
        <option value="editHome.php">Acceuil</option>
        <option value="editAbout.php">A propos</option>
        <option value="editShop.php">Boutique</option>
        <option value="editContact.php">Contact</option>
        <option value="editDelivery.php">Livraison & Retours</option>
        <option value="editObligations.php">Obligations</option>
        <option value="editProduct.php">Produit</option>
        <option value="editFooter.php">Pied de page</option>
    </select>
</div>
<?php
echo $content;

//--- MODIFICATIONS ---//
if(isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'change'))
{ 
    if(isset($_GET['idProduct']))
    {
        $result = executeQuery("SELECT * FROM `products` WHERE `idProduct`= '$_GET[idProduct]'");
        $current_product = $result->fetch_assoc(); 
    }
    echo '
    <h4 class="justify-content-center mb-3">Produit</h4><!--mettre patern et title a required-->
    <form method="post" enctype="multipart/form-data" id="form-product">
        <div class="row g-3">
            <input type="hidden" id="idProduct" name="idProduct" value="'; if(isset($current_product['idProduct'])) echo $current_product['idProduct']; echo '">
            <div class="col-12">
                <label for="reference" class="form-label">Référence du produit</label>
                <input type="text" class="form-control" id="reference" name="reference" required value="'; if(isset($current_product['reference'])) echo $current_product['reference']; echo '">
            </div>
            <div class="col-12">
                <label for="name" class="form-label">Nom exact du Produit</label>
                <input type="text" class="form-control" id="name" name="name" required value="'; if(isset($current_product['name'])) echo $current_product['name']; echo '">
            </div>
            <div class="col-12">
                <label for="sentence" class="form-label">Phrase enjolivante et adjéctiver du produit</label>
                <input type="text" class="form-control" id="sentence" name="sentence" required value="'; if(isset($current_product['sentence'])) echo $current_product['sentence']; echo '">
            </div>
            <div class="col-sm-6">
                <label for="strongPoint1" class="form-label">Point fort 1</label>
                <input type="text" class="form-control" id="strongPoint1" name="strongPoint1" value="'; if(isset($current_product['strongPoint1'])) echo $current_product['strongPoint1']; echo '">
            </div>
            <div class="col-sm-6">
                <label for="strongPoint2" class="form-label">Point fort 2</label>
                <input type="text" class="form-control" id="strongPoint2" name="strongPoint2" value="'; if(isset($current_product['strongPoint2'])) echo $current_product['strongPoint2']; echo '">
            </div>
            <div class="col-sm-6">
                <label for="strongPoint3" class="form-label">Point fort 3</label>
                <input type="text" class="form-control" id="strongPoint3" name="strongPoint3" value="'; if(isset($current_product['strongPoint3'])) echo $current_product['strongPoint3']; echo '">
            </div>
            <div class="col-sm-6">
                <label for="strongPoint4" class="form-label">Point fort 4</label>
                <input type="text" class="form-control" id="strongPoint4" name="strongPoint4" value="'; if(isset($current_product['strongPoint4'])) echo $current_product['strongPoint4']; echo '">
            </div>
            <div class="col-12">
                <label for="text1" class="form-label">Description 1</label>
                <textarea class="form-control" id="text1" name="text1">'; if(isset($current_product['text1'])) echo $current_product['text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text2" class="form-label">Description 2</label>
                <textarea class="form-control" id="text2" name="text2">'; if(isset($current_product['text2'])) echo $current_product['text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text3" class="form-label">Description 3</label>
                <textarea class="form-control" id="text3" name="text3">'; if(isset($current_product['text3'])) echo $current_product['text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text4" class="form-label">Description 4</label>
                <textarea class="form-control" id="text4" name="text4">'; if(isset($current_product['text4'])) echo $current_product['text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text5" class="form-label">Description 5</label>
                <textarea class="form-control" id="text5" name="text5">'; if(isset($current_product['text5'])) echo $current_product['text5']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text6" class="form-label">Description 6</label>
                <textarea class="form-control" id="text6" name="text6">'; if(isset($current_product['text6'])) echo $current_product['text6']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">';
                if(isset($current_product))
                {
                    echo '<i>Vous pouvez uplaoder une nouvelle photo si vous souhaitez la changer</i><br>';
                    echo '<input type="hidden" name="photoCurrent" value="' . $current_product['photo'] . '"><br>';
                }
                echo '
            </div>
            <div class="col-12">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" id="price" name="price" required value="'; if(isset($current_product['price'])) echo $current_product['price']; echo '">
            </div>
            <div class="col-12">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" required value="'; if(isset($current_product['stock'])) echo $current_product['stock']; echo '">
            </div>
            <div class="col-12">
                <label for="caroussel" class="form-label">Afficher dans le caroussel de la page d\'acceuil ?</label>
                <select class="form-select" id="caroussel" name="caroussel" required>
                    <option value="non"'; if(isset($current_product['caroussel']) && $current_product['caroussel'] == 'non') echo ' selected'; echo '>Non</option>
                    <option value="oui"'; if(isset($current_product['caroussel']) && $current_product['caroussel'] == 'oui') echo ' selected'; echo '>Oui</option>
                </select>
            </div>
            <div class="col-12">
                <label for="bestsellers" class="form-label">Afficher dans la partie "Meilleures Ventes" de la page d\'acceuil ? (3 Maximum)</label>
                <select class="form-select" id="bestsellers" name="bestsellers" required>
                    <option value="non"'; if(isset($current_product['bestsellers']) && $current_product['bestsellers'] == 'non') echo ' selected'; echo '>Non</option>
                    <option value="oui"'; if(isset($current_product['bestsellers']) && $current_product['bestsellers'] == 'oui') echo ' selected'; echo '>Oui</option>
                </select>
            </div>
            <button class="w-100 btn btn-primary btn-lg mb-3" type="submit" value="'; echo ucfirst($_GET['action']) . ' du produit">Enregistrement du produit</button>
        </div>
    </form>';
} 
?>
</main>
</div>
</div>
</body>
</html>