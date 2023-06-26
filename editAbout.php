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
    executeQuery("INSERT INTO `editAbout` (`id`, `dateEdit`, `title`, `subtitle`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`) VALUES ('1', NOW(), '$_POST[title]', '$_POST[subtitle]', '$_POST[text1]', '$_POST[text2]', '$_POST[text3]', '$_POST[text4]', '$_POST[text5]', '$_POST[text6]', '$_POST[text7]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `title` = '$_POST[title]', `subtitle` = '$_POST[subtitle]', `text1` = '$_POST[text1]', `text2` = '$_POST[text2]', `text3` = '$_POST[text3]', `text4` = '$_POST[text4]', `text5` = '$_POST[text5]', `text6` = '$_POST[text6]', `text7` = '$_POST[text7]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---//
$result = executeQuery("SELECT * FROM `editAbout`");
while($line = $result->fetch_assoc())  
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}
                    <div class='about-div text-center'>
                    <h3>{$line['title']}</h3>
                    <h4>{$line['subtitle']}</h4>
                    <p>{$line['text1']}</p>
                    <p>{$line['text2']}</p>
                    <p>{$line['text3']}</p>
                    <p>{$line['text4']}</p>
                    <p>{$line['text5']}</p>
                    <p>{$line['text6']}</p>
                    <p>{$line['text7']}</p>
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
    $result = executeQuery("SELECT * FROM `editAbout`");
    $data_about = $result->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">A propos</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="title" class="form-label">Titre</label>
                <textarea class="form-control" id="title" name="title" required>'; if(isset($data_about['title'])) echo $data_about['title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="subtitle" class="form-label">Sous-titre</label>
                <textarea class="form-control" id="subtitle" name="subtitle">'; if(isset($data_about['subtitle'])) echo $data_about['subtitle']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text1" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text1" name="text1" required>'; if(isset($data_about['text1'])) echo $data_about['text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text2" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text2" name="text2">'; if(isset($data_about['text2'])) echo $data_about['text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text3" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text3" name="text3">'; if(isset($data_about['text3'])) echo $data_about['text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text4" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text4" name="text4">'; if(isset($data_about['text4'])) echo $data_about['text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text5" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text5" name="text5">'; if(isset($data_about['text5'])) echo $data_about['text5']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text6" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text6" name="text6">'; if(isset($data_about['text6'])) echo $data_about['text6']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="text7" class="form-label">Paragraphe</label>
                <textarea class="form-control" id="text7" name="text7">'; if(isset($data_about['text7'])) echo $data_about['text7']; echo '</textarea>
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