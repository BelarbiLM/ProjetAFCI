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
    executeQuery("INSERT INTO `editObligations` (`id`, `dateEdit`, `part1text1`, `part1text2`, `part1text3`, `part1text4`, `part2text1`, `part2text2`, `part2text3`, `part2text4`, `part3text1`, `part3text2`, `part3text3`, `part3text4`, `part4text1`, `part4text2`, `part4text3`, `part4text4`) VALUES ('1', NOW(), '$_POST[part1text1]', '$_POST[part1text2]', '$_POST[part1text3]', '$_POST[part1text4]', '$_POST[part2text1]', '$_POST[part2text2]', '$_POST[part2text3]', '$_POST[part2text4]', '$_POST[part3text1]', '$_POST[part3text2]', '$_POST[part3text3]', '$_POST[part3text4]', '$_POST[part4text1]', '$_POST[part4text2]', '$_POST[part4text3]', '$_POST[part4text4]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `part1text1` = '$_POST[part1text1]', `part1text2` = '$_POST[part1text2]', `part1text3` = '$_POST[part1text3]', `part1text4` = '$_POST[part1text4]', `part2text1` = '$_POST[part2text1]', `part2text2` = '$_POST[part2text2]', `part2text3` = '$_POST[part2text3]', `part2text4` = '$_POST[part2text4]', `part3text1` = '$_POST[part3text1]', `part3text2` = '$_POST[part3text2]', `part3text3` = '$_POST[part3text3]', `part3text4` = '$_POST[part3text4]', `part4text1` = '$_POST[part4text1]', `part4text2` = '$_POST[part4text2]', `part4text3` = '$_POST[part4text3]', `part4text4` = '$_POST[part4text4]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---// 
$result = executeQuery("SELECT * FROM `editObligations`");
while($line = $result->fetch_assoc()) 
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<div class='legal-obligations-description'>
                    <div class='notice'>
                        <h4>Mentions légales :</h4>
                        <p>{$line['part1text1']}</p>
                        <p>{$line['part1text2']}</p>
                        <p>{$line['part1text3']}</p>
                        <p>{$line['part1text4']}</p>
                    </div>
                    <div class='terms'>
                        <h4>Conditions Génrales de ventes :</h4>
                        <p>{$line['part2text1']}</p>
                        <p>{$line['part2text2']}</p>
                        <p>{$line['part2text3']}</p>
                        <p>{$line['part2text4']}</p>
                    </div>
                    <div class='cookies'>
                        <h4>Gestion des cookies :</h4>
                        <p>{$line['part3text1']}</p>
                        <p>{$line['part3text2']}</p>
                        <p>{$line['part3text3']}</p>
                        <p>{$line['part3text4']}</p>
                    </div>
                    <div class='private-life'>
                        <h4>Politique de vie privée :</h4>
                        <p>{$line['part4text1']}</p>
                        <p>{$line['part4text2']}</p>
                        <p>{$line['part4text3']}</p>
                        <p>{$line['part4text4']}</p>
                    </div>
                </div>";
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
    $result = executeQuery("SELECT * FROM `editObligations`");
    $data_obligations = $result->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Obligations légales</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="part1text1" class="form-label">Paragraphe 1 de "Mentions légales"</label>
                <textarea class="form-control" id="part1text1" name="part1text1">'; if(isset($data_obligations['part1text1'])) echo $data_obligations['part1text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text2" class="form-label">Paragraphe 2 de "Mentions légales"</label>
                <textarea class="form-control" id="part1text2" name="part1text2">'; if(isset($data_obligations['part1text2'])) echo $data_obligations['part1text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text3" class="form-label">Paragraphe 3 de "Mentions légales"</label>
                <textarea class="form-control" id="part1text3" name="part1text3">'; if(isset($data_obligations['part1text3'])) echo $data_obligations['part1text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text4" class="form-label">Paragraphe 4 de "Mentions légales"</label>
                <textarea class="form-control" id="part1text4" name="part1text4">'; if(isset($data_obligations['part1text4'])) echo $data_obligations['part1text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text1" class="form-label">Paragraphe 1 de "Conditions générales de ventes"</label>
                <textarea class="form-control" id="part2text1" name="part2text1">'; if(isset($data_obligations['part2text1'])) echo $data_obligations['part2text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text2" class="form-label">Paragraphe 2 de "Conditions générales de ventes"</label>
                <textarea class="form-control" id="part2text2" name="part2text2">'; if(isset($data_obligations['part2text2'])) echo $data_obligations['part2text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text3" class="form-label">Paragraphe 3 de "Conditions générales de ventes"</label>
                <textarea class="form-control" id="part2text3" name="part2text3">'; if(isset($data_obligations['part2text3'])) echo $data_obligations['part2text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text4" class="form-label">Paragraphe 4 de "Conditions générales de ventes"</label>
                <textarea class="form-control" id="part2text4" name="part2text4">'; if(isset($data_obligations['part2text4'])) echo $data_obligations['part2text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text1" class="form-label">Paragraphe 1 de "Gestion des cookies"</label>
                <textarea class="form-control" id="part3text1" name="part3text1">'; if(isset($data_obligations['part3text1'])) echo $data_obligations['part3text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text2" class="form-label">Paragraphe 2 de "Gestion des cookies"</label>
                <textarea class="form-control" id="part3text2" name="part3text2">'; if(isset($data_obligations['part3text2'])) echo $data_obligations['part3text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text3" class="form-label">Paragraphe 3 de "Gestion des cookies"</label>
                <textarea class="form-control" id="part3text3" name="part3text3">'; if(isset($data_obligations['part3text3'])) echo $data_obligations['part3text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text4" class="form-label">Paragraphe 4 de "Gestion des cookies"</label>
                <textarea class="form-control" id="part3text4" name="part3text4">'; if(isset($data_obligations['part3text4'])) echo $data_obligations['part3text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text1" class="form-label">Paragraphe 1 de "Politique de vie privée"</label>
                <textarea class="form-control" id="part4text1" name="part4text1">'; if(isset($data_obligations['part4text1'])) echo $data_obligations['part4text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text2" class="form-label">Paragraphe 2 de "Politique de vie privée"</label>
                <textarea class="form-control" id="part4text2" name="part4text2">'; if(isset($data_obligations['part4text2'])) echo $data_obligations['part4text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text3" class="form-label">Paragraphe 3 de "Politique de vie privée"</label>
                <textarea class="form-control" id="part4text3" name="part4text3">'; if(isset($data_obligations['part4text3'])) echo $data_obligations['part4text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text4" class="form-label">Paragraphe 4 de "Politique de vie privée"</label>
                <textarea class="form-control" id="part4text4" name="part4text4">'; if(isset($data_obligations['part4text4'])) echo $data_obligations['part4text4']; echo '</textarea>
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