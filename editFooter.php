<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';
//--- ENREGISTREMENT ---//
if(!empty($_POST))
{ 
    $logo = ""; 

    if(isset($_GET['action']) && $_GET['action'] == 'change')
    {
        $logo = $_POST['logoCurrent'];
    }

    if(!empty($_FILES['logo']['name'])) 
    { 
        $logo_name = $_POST['dateEdit'] . '_' .$_FILES['logo']['name'];
        $logo = RACINE_SITE . "photo/$logo_name";
        $logo_file = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$logo_name"; 
        copy($_FILES['logo']['tmp_name'],$logo_file);
    }

    foreach($_POST as $index => $value)
    {
        $_POST[$index] = htmlEntities(addSlashes($value));
        $_POST[$index] = htmlspecialchars($value, ENT_QUOTES);
    }
    executeQuery("INSERT INTO `editFooter` (`id`, `dateEdit`, `logo`, `text`, `linkTwitter`, `linkFacebook`, `linkInstgram`, `linkTiktok`, `linkYoutube`, `title1`, `title2`) VALUES ('1', NOW(), '$logo', '$_POST[text]', '$_POST[linkTwitter]', '$_POST[linkFacebook]', '$_POST[linkInstgram]', '$_POST[linkTiktok]', '$_POST[linkYoutube]', '$_POST[title1]', '$_POST[title2]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `logo` = '$logo', `text` = '$_POST[text]', `linkTwitter` = '$_POST[linkTwitter]', `linkFacebook` = '$_POST[linkFacebook]', `linkInstgram` = '$_POST[linkInstgram]', `linkTiktok` = '$_POST[linkTiktok]', `linkYoutube` = '$_POST[linkYoutube]', `title1` = '$_POST[title1]', `title2` = '$_POST[title2]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---//
$result = executeQuery("SELECT * FROM `editFooter`");
while($line = $result->fetch_assoc()) 
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<footer class='py-3 border-top'>
                    <div class='d-flex flex-wrap justify-content-between align-items-center border-bottom'>
                        <div class='col-md-4 d-flex align-items-center'>
                            <a href='<?php echo RACINE_SITE; ?>home.php' class='d-flex justify-content-center me-2 mb-md-0 text-muted text-decoration-none lh-1'>
                                <img src='{$line['logo']}'>
                            </a>
                            <span class='mb-md-0 text-white'>{$line['text']}</span>
                        </div>
                        <ul class='nav col-md-4 justify-content-end list-unstyled d-flex'>
                            <li class='ms-3'><a href='{$line['linkTwitter']}' class='text-white'><i class='bi bi-twitter'></i></a></li>
                            <li class='ms-3'><a href='{$line['linkFacebook']}' class='text-white'><i class='bi bi-facebook'></i></a></li>
                            <li class='ms-3'><a href='{$line['linkInstgram']}' class='text-white'><i class='bi bi-instagram'></i></a></li>
                            <li class='ms-3'><a href='{$line['linkTiktok']}' class='text-white'><i class='bi bi-tiktok'></i></a></li>
                            <li class='ms-3'><a href='{$line['linkYoutube']}' class='text-white'><i class='bi bi-youtube'></i></a></li>
                        </ul>
                    </div>
                    <div class='d-flex align-items-center'>
                        <div class='footer-zone d-flex flex-column text-center'>
                            <h4>{$line['title1']}</h4>
                            <a>Contact</a>
                            <a>Livraisons & Retours</a>
                        </div>
                        <div class='footer-zone d-flex flex-column text-center'>
                            <h4>{$line['title2']}</h4>
                            <a>A propos</a>
                            <a>Obligations légales</a>
                        </div>
                    </div>   
                    </footer>";
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
    $resultat = executeQuery("SELECT * FROM `editFooter`");
    $data_footer = $resultat->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Pied de page</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">';
                if(isset($data_footer))
                {
                    echo '<i>Vous pouvez uplaoder un nouveau logo si vous souhaitez la changer</i><br>';
                    echo '<input type="hidden" name="logoCurrent" value="' . $data_footer['logo'] . '"><br>';
                }
                echo '
            </div>
            <div class="col-12">
                <label for="text" class="form-label">Texte a coté du logo</label>
                <textarea class="form-control" id="text" name="text" required>'; if(isset($data_footer['text'])) echo $data_footer['text']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="linkTwitter" class="form-label">Lien de redirection Twitter</label>
                <textarea class="form-control" id="linkTwitter" name="linkTwitter">'; if(isset($data_footer['linkTwitter'])) echo $data_footer['linkTwitter']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="linkFacebook" class="form-label">Lien de redirection Facebook / Meta</label>
                <textarea class="form-control" id="linkFacebook" name="linkFacebook">'; if(isset($data_footer['linkFacebook'])) echo $data_footer['linkFacebook']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="linkInstgram" class="form-label">Lien de redirection Instagram</label>
                <textarea class="form-control" id="linkInstgram" name="linkInstgram">'; if(isset($data_footer['linkInstgram'])) echo $data_footer['linkInstgram']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="linkTiktok" class="form-label">Lien de redirection TikTok</label>
                <textarea class="form-control" id="linkTiktok" name="linkTiktok">'; if(isset($data_footer['linkTiktok'])) echo $data_footer['linkTiktok']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="linkYoutube" class="form-label">Lien de redirection YouTube</label>
                <textarea class="form-control" id="linkYoutube" name="linkYoutube">'; if(isset($data_footer['linkYoutube'])) echo $data_footer['linkYoutube']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="title1" class="form-label">Titre de la première colonne du menu</label>
                <textarea class="form-control" id="title1" name="title1" required>'; if(isset($data_footer['title1'])) echo $data_footer['title1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="title2" class="form-label">Titre de la seconde colonne du menu</label>
                <textarea class="form-control" id="title2" name="title2" required>'; if(isset($data_footer['title2'])) echo $data_footer['title2']; echo '</textarea>
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