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
    executeQuery("INSERT INTO `editHome` (`id`, `dateEdit`, `title1`, `text1`, `title2`, `text2`, `title3`, `text3`, `title4`, `text4`) VALUES ('1', NOW(), '$_POST[title1]', '$_POST[text1]', '$_POST[title2]', '$_POST[text2]', '$_POST[title3]', '$_POST[text3]', '$_POST[title4]', '$_POST[text4]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `title1` = '$_POST[title1]', `text1` = '$_POST[text1]', `title2` = '$_POST[title2]', `text2` = '$_POST[text2]', `title3` = '$_POST[title3]', `text3` = '$_POST[text3]', `title4` = '$_POST[title4]', `text4` = '$_POST[text4]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---//
$result = executeQuery("SELECT * FROM `editHome`");
while($line = $result->fetch_assoc()) 
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<hr class='featurette-divider'>

                    <div class='row featurette'>
                    <div class='col-md-7'>
                        <h2 class='featurette-heading fw-normal lh-1'>{$line['title1']}</h2>
                        <p class='lead'>{$line['text1']}</p>
                    </div>
                </div>

                <hr class='featurette-divider'>

                <div class='row featurette'>
                    <div class='col-md-7 order-md-2 text-end'>
                        <h2 class='featurette-heading fw-normal lh-1'>{$line['title2']}</h2>
                        <p class='lead'>{$line['text2']}</p>
                    </div>
                </div>

                <hr class='featurette-divider'>

                    <div class='row featurette'>
                    <div class='col-md-7'>
                        <h2 class='featurette-heading fw-normal lh-1'>{$line['title3']}</h2>
                        <p class='lead'>{$line['text3']}</p>
                    </div>
                </div>

                <hr class='featurette-divider'>

                <div class='row featurette'>
                    <div class='col-md-7 order-md-2 text-end'>
                        <h2 class='featurette-heading fw-normal lh-1'>{$line['title4']}</h2>
                        <p class='lead'>{$line['text4']}</p>
                    </div>
                </div>

                <hr class='featurette-divider'>";
    $content .= '<a href="?action=change" class="d-flex justify-content-center text-decoration-none"><button type="submit" class="btn btn-secondary my-3 me-3 btn-lg">Modifier</button></a>';
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
    $resultat = executeQuery("SELECT * FROM `editHome`");
    $data_home = $resultat->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Acceuil</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="title1" class="form-label">Titre de la Zone 1</label>
                <textarea class="form-control" id="title1" name="title1" required>'; if(isset($data_home['title1'])) echo $data_home['title1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text1" class="form-label">Texte de la Zone 1</label>
                <textarea class="form-control" id="text1" name="text1">'; if(isset($data_home['text1'])) echo $data_home['text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="title2" class="form-label">Titre de la Zone 2</label>
                <textarea class="form-control" id="title2" name="title2" required>'; if(isset($data_home['title2'])) echo $data_home['title2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text2" class="form-label">Texte de la Zone 2</label>
                <textarea class="form-control" id="text2" name="text2">'; if(isset($data_home['text2'])) echo $data_home['text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="title3" class="form-label">Titre de la Zone 3</label>
                <textarea class="form-control" id="title1" name="title3" required>'; if(isset($data_home['title3'])) echo $data_home['title3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text3" class="form-label">Texte de la Zone 3</label>
                <textarea class="form-control" id="text1" name="text3">'; if(isset($data_home['text3'])) echo $data_home['text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="title4" class="form-label">Titre de la Zone 4</label>
                <textarea class="form-control" id="title4" name="title4" required>'; if(isset($data_home['title4'])) echo $data_home['title4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text4" class="form-label">Texte de la Zone 4</label>
                <textarea class="form-control" id="text4" name="text4">'; if(isset($data_home['text4'])) echo $data_home['text4']; echo '</textarea>
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