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
    executeQuery("INSERT INTO `editContact` (`id`, `dateEdit`, `title`, `subtitle`, `part1title`, `part1text1`, `part1text2`, `part2title`, `part2text1`, `part2text2`, `part3title`, `part3text1`, `part3text2`, `part4title`, `part4text1`, `part4text2`) VALUES ('1', NOW(), '$_POST[title]', '$_POST[subtitle]', '$_POST[part1title]', '$_POST[part1text1]', '$_POST[part1text2]', '$_POST[part2title]', '$_POST[part2text1]', '$_POST[part2text2]', '$_POST[part3title]', '$_POST[part3text1]', '$_POST[part3text2]', '$_POST[part4title]', '$_POST[part4text1]', '$_POST[part4text2]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `title` = '$_POST[title]', `subtitle` = '$_POST[subtitle]', `part1title` = '$_POST[part1title]', `part1text1` = '$_POST[part1text1]', `part1text2` = '$_POST[part1text2]', `part2title` = '$_POST[part2title]', `part2text1` = '$_POST[part2text1]', `part2text2` = '$_POST[part2text2]', `part3title` = '$_POST[part3title]', `part3text1` = '$_POST[part3text1]', `part3text2` = '$_POST[part3text2]', `part4title` = '$_POST[part4title]', `part4text1` = '$_POST[part4text1]', `part4text2` = '$_POST[part4text2]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---//
$result = executeQuery("SELECT * FROM `editContact`");
while($line = $result->fetch_assoc()) 
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<h4 class='text-center my-5'>{$line['title']}</h4>
                    <h5 class='text-center my-5'>{$line['subtitle']}</h5>

                    <div class='row featurette'>
                    <div class='col-md-7'>
                        <div class='contact-detail-1'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['part1title']}</h2>
                        </div>
                        <p class='lead'>{$line['part1text1']}</p>
                        <p class='lead'>{$line['part1text2']}</p>
                    </div>
                    </div>

                    <hr class='featurette-divider'>

                    <div class='row featurette'>
                    <div class='col-md-7 order-md-2 text-end'>
                        <div class='contact-detail-2-right'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['part2title']}</h2>
                        </div>
                        <p class='lead'>{$line['part2text1']}</p>
                        <p class='lead'>{$line['part2text2']}</p>
                    </div>
                    </div>

                    <hr class='featurette-divider'>

                    <div class='row featurette'>
                    <div class='col-md-7'>
                        <div class='contact-detail-1'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['part3title']}</h2>
                        </div>
                        <p class='lead'>{$line['part3text1']}</p>
                        <p class='lead'>{$line['part3text2']}</p>
                    </div>
                    </div>

                    <hr class='featurette-divider'>

                    <div class='row featurette'>
                    <div class='col-md-7'>
                        <div class='contact-detail-1'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['part4title']}</h2>
                        </div>
                        <p class='lead'>{$line['part4text1']}</p>
                        <p class='lead'>{$line['part4text1']}</p>
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
    $result = executeQuery("SELECT * FROM `editContact`");
    $data_contact = $result->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Contact</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="title" class="form-label">Titre/Texte 1 de haut de page</label>
                <textarea class="form-control" id="title" name="title">'; if(isset($data_contact['title'])) echo $data_contact['title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="subtitle" class="form-label">Sous-titre/Texte 2 de haut de page</label>
                <textarea class="form-control" id="subtitle" name="subtitle">'; if(isset($data_contact['subtitle'])) echo $data_contact['subtitle']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1title" class="form-label">Titre pour une 1er partie</label>
                <textarea class="form-control" id="part1title" name="part1title">'; if(isset($data_contact['part1title'])) echo $data_contact['part1title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text1" class="form-label">Texte 1 pour la 1er partie</label>
                <textarea class="form-control" id="part1text1" name="part1text1">'; if(isset($data_contact['part1text1'])) echo $data_contact['part1text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text2" class="form-label">Texte 2 pour la 1er partie</label>
                <textarea class="form-control" id="part1text2" name="part1text2">'; if(isset($data_contact['part1text2'])) echo $data_contact['part1text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2title" class="form-label">Titre pour une 2eme partie</label>
                <textarea class="form-control" id="part2title" name="part2title">'; if(isset($data_contact['part2title'])) echo $data_contact['part2title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text1" class="form-label">Texte 1 pour la 2eme partie</label>
                <textarea class="form-control" id="part2text1" name="part2text1">'; if(isset($data_contact['part2text1'])) echo $data_contact['part2text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text2" class="form-label">Texte 2 pour la 2eme partie</label>
                <textarea class="form-control" id="part2text2" name="part2text2">'; if(isset($data_contact['part2text2'])) echo $data_contact['part2text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3title" class="form-label">Titre pour une 3eme partie</label>
                <textarea class="form-control" id="part3title" name="part3title">'; if(isset($data_contact['part3title'])) echo $data_contact['part3title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text1" class="form-label">Texte 1 pour la 3eme partie</label>
                <textarea class="form-control" id="part3text1" name="part3text1">'; if(isset($data_contact['part3text1'])) echo $data_contact['part3text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text2" class="form-label">Texte 2 pour la 3eme partie</label>
                <textarea class="form-control" id="part3text2" name="part3text2">'; if(isset($data_contact['part3text2'])) echo $data_contact['part3text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4title" class="form-label">Titre pour une 4eme partie</label>
                <textarea class="form-control" id="part4title" name="part4title">'; if(isset($data_contact['part4title'])) echo $data_contact['part4title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text1" class="form-label">Texte 1 pour la 4eme partie</label>
                <textarea class="form-control" id="part4text1" name="part4text1">'; if(isset($data_contact['part4text1'])) echo $data_contact['part4text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part4text2" class="form-label">Texte 2 pour la 4eme partie</label>
                <textarea class="form-control" id="part4text2" name="part4text2">'; if(isset($data_contact['part4text2'])) echo $data_contact['part4text2']; echo '</textarea>
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