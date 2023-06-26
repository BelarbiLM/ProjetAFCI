<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';
//--- ENREGISTREMENT ---//
if(!empty($_POST))
{ 
    foreach($_POST as $index => $value)
    {
        $_POST[$index] = htmlEntities(addSlashes($value));
        $_POST[$index] = htmlspecialchars($value, ENT_QUOTES);
    }
    executeQuery("INSERT INTO `editShop` (`id`, `dateEdit`, `text1`, `text2`, `text3`, `text4`) VALUES ('1', NOW(), '$_POST[text1]', '$_POST[text2]', '$_POST[text3]', '$_POST[text4]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(),`text1` = '$_POST[text1]',`text2` = '$_POST[text2]',`text3` = '$_POST[text3]',`text4` = '$_POST[text4]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---//
$result = executeQuery("SELECT * FROM `editShop`");
while($line = $result->fetch_assoc())
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<section class='text-center container'>
                    <div class='row py-lg-5'>
                        <div class='col-lg-6 col-md-8 w-100'>
                            <h1 class='fw-light mb-5'>Notre Boutique</h1>
                            <p class='text-muted'>{$line['text1']}</p>
                            <p class='text-muted'>{$line['text2']}</p>
                            <p class='text-muted'>{$line['text3']}</p>
                            <p class='text-muted'>{$line['text4']}</p>
                            <a href='?action=change' class='d-flex justify-content-center text-decoration-none'><button type='submit' class='btn btn-secondary my-3 me-3 btn-lg'>Modifier</button></a>
                        </div>
                    </div>
                 </section>";
    
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
if(isset($_GET['action']) && ($_GET['action'] == 'change')) 
{
    $result = executeQuery("SELECT * FROM `editShop`");
    $data_shop = $result->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Boutique</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="text1" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text1" name="text1" required>'; if(isset($data_shop['text1'])) echo $data_shop['text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text2" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text2" name="text2">'; if(isset($data_shop['text2'])) echo $data_shop['text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text3" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text3" name="text3">'; if(isset($data_shop['text3'])) echo $data_shop['text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text4" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text4" name="text4">'; if(isset($data_shop['text4'])) echo $data_shop['text4']; echo '</textarea>
            </div>
            <button class="w-100 btn btn-primary btn-lg mb-3" type="submit" value="'; echo ucfirst($_GET['action']) . '">Enregistrement</button>
        </div>
    </form>';
}
?>
</main>
</div>
</div>
</body>
</html>