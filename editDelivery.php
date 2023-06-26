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
    executeQuery("INSERT INTO `editDelivery` (`id`, `dateEdit`, `title`, `subtitle1`, `subtitle2`, `part1title`, `part1text1`, `part1text2`, `part1text3`, `part1text4`, `part2title`, `part2text1`, `part2text2`, `part2text3`, `part2text4`, `part3title`, `part3text1`, `part3text2`, `part3text3`, `part3text4`) VALUES ('1', NOW(), '$_POST[title]', '$_POST[subtitle1]', '$_POST[subtitle2]', '$_POST[part1title]', '$_POST[part1text1]', '$_POST[part1text2]', '$_POST[part1text3]', '$_POST[part1text4]', '$_POST[part2title]', '$_POST[part2text1]', '$_POST[part2text2]', '$_POST[part2text3]', '$_POST[part2text4]', '$_POST[part3title]', '$_POST[part3text1]', '$_POST[part3text2]', '$_POST[part3text3]', '$_POST[part3text4]') ON DUPLICATE KEY UPDATE `dateEdit` = NOW(), `title` = '$_POST[title]', `subtitle1` = '$_POST[subtitle1]', `subtitle2` = '$_POST[subtitle2]', `part1title` = '$_POST[part1title]', `part1text1` = '$_POST[part1text1]', `part1text2` = '$_POST[part1text2]', `part1text3` = '$_POST[part1text3]', `part1text4` = '$_POST[part1text4]', `part2title` = '$_POST[part2title]', `part2text1` = '$_POST[part2text1]', `part2text2` = '$_POST[part2text2]', `part2text3` = '$_POST[part2text3]', `part2text4` = '$_POST[part2text4]', `part3title` = '$_POST[part3title]', `part3text1` = '$_POST[part3text1]', `part3text2` = '$_POST[part3text2]', `part3text3` = '$_POST[part3text3]', `part3text4` = '$_POST[part3text4]';");
    $content .= '<div class="requete-valid d-flex justify-content-center align-items-center">Enregistrement réalisé</div>'; 
    $_GET['action'] = 'display';
}

//--- AFFICHAGE ---// 
$result = executeQuery("SELECT * FROM `editDelivery`");
while($line = $result->fetch_assoc()) 
{
    $content .= "<div>Date de modifications : {$line['dateEdit']}";
    $content .= "<div class='delivery-title px-4 py-5 mt-5 text-center'>
                    <h2>{$line['title']}</h3>
                    <div class='col-lg-6 mx-auto'>
                        <p class='lead mb-4'>{$line['subtitle1']}</p>
                        <p class='lead mb-4'>{$line['subtitle2']}</p>
                    </div>
                    </div>

                    <div class='container px-4 py-5'>
                    <div class='delivery-zone text-center mb-5'>
                        <div>
                            <h3 class='fs-2'>{$line['part1title']}</h3>
                            <p>{$line['part1text1']}</p>
                            <p>{$line['part1text2']}</p>
                            <p>{$line['part1text3']}</p>
                            <p>{$line['part1text4']}</p>
                        </div>
                    </div>
                    <div class='delivery-zone text-center mb-5'>
                        <div>
                            <h3 class='fs-2'>{$line['part2title']}</h3>
                            <p>{$line['part2text1']}</p> 
                            <p>{$line['part2text2']}</p>    
                            <p>{$line['part2text3']}</p>  
                            <p>{$line['part2text4']}</p>      
                        </div>
                    </div>
                    <div class='delivery-zone text-center mb-5'>
                        <div>
                            <h3 class='fs-2'>{$line['part3title']}</h3>
                            <p>{$line['part3text1']}</p>  
                            <p>{$line['part3text2']}</p>
                            <p>{$line['part3text3']}</p>  
                            <p>{$line['part3text4']}</p>  
                        </div>
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
    $result = executeQuery("SELECT * FROM `editDelivery`");
    $data_delivery = $result->fetch_assoc(); 
    echo '
    <h4 class="justify-content-center mb-3">Acceuil</h4>
    <form method="post" enctype="multipart/form-data" id="form-about">
        <div class="row g-3">
            <div class="col-12">
                <label for="title" class="form-label">Titre/Texte 1 de haut de page</label>
                <textarea class="form-control" id="title" name="title">'; if(isset($data_delivery['title'])) echo $data_delivery['title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="subtitle1" class="form-label">Sous-titre/Texte 2 de haut de page</label>
                <textarea class="form-control" id="subtitle1" name="subtitle1">'; if(isset($data_delivery['subtitle1'])) echo $data_delivery['subtitle1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="subtitle2" class="form-label">Sous-titre/Texte 3 de haut de page</label>
                <textarea class="form-control" id="subtitle2" name="subtitle2">'; if(isset($data_delivery['subtitle2'])) echo $data_delivery['subtitle2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1title" class="form-label">Titre du bloc 1</label>
                <textarea class="form-control" id="part1title" name="part1title">'; if(isset($data_delivery['part1title'])) echo $data_delivery['part1title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text1" class="form-label">Texte 1 du bloc 1</label>
                <textarea class="form-control" id="part1text1" name="part1text1">'; if(isset($data_delivery['part1text1'])) echo $data_delivery['part1text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text2" class="form-label">Texte 2 du bloc 1</label>
                <textarea class="form-control" id="part1text2" name="part1text2">'; if(isset($data_delivery['part1text2'])) echo $data_delivery['part1text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text3" class="form-label">Texte 3 du bloc 1</label>
                <textarea class="form-control" id="part1text3" name="part1text3">'; if(isset($data_delivery['part1text3'])) echo $data_delivery['part1text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part1text4" class="form-label">Texte 4 du bloc 1</label>
                <textarea class="form-control" id="part1text4" name="part1text4">'; if(isset($data_delivery['part1text4'])) echo $data_delivery['part1text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2title" class="form-label">Titre du bloc 2</label>
                <textarea class="form-control" id="part2title" name="part2title">'; if(isset($data_delivery['part2title'])) echo $data_delivery['part2title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text1" class="form-label">Texte 1 du bloc 2</label>
                <textarea class="form-control" id="part2text1" name="part2text1">'; if(isset($data_delivery['part2text1'])) echo $data_delivery['part2text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text2" class="form-label">Texte 2 du bloc 2</label>
                <textarea class="form-control" id="part2text2" name="part2text2">'; if(isset($data_delivery['part2text2'])) echo $data_delivery['part2text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text3" class="form-label">Texte 3 du bloc 2</label>
                <textarea class="form-control" id="part2text3" name="part2text3">'; if(isset($data_delivery['part2text3'])) echo $data_delivery['part2text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part2text4" class="form-label">Texte 4 du bloc 2</label>
                <textarea class="form-control" id="part2text4" name="part2text4">'; if(isset($data_delivery['part2text4'])) echo $data_delivery['part2text4']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3title" class="form-label">Titre 3 du bloc 3</label>
                <textarea class="form-control" id="part3title" name="part3title">'; if(isset($data_delivery['part3title'])) echo $data_delivery['part3title']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text1" class="form-label">Texte 1 du bloc 3</label>
                <textarea class="form-control" id="part3text1" name="part3text1">'; if(isset($data_delivery['part3text1'])) echo $data_delivery['part3text1']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text2" class="form-label">Texte 2 du bloc 3</label>
                <textarea class="form-control" id="part3text2" name="part3text2">'; if(isset($data_delivery['part3text2'])) echo $data_delivery['part3text2']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text3" class="form-label">Texte 3 du bloc 3</label>
                <textarea class="form-control" id="part3text3" name="part3text3">'; if(isset($data_delivery['part3text3'])) echo $data_delivery['part3text3']; echo '</textarea>
            </div>
            <div class="col-12">
                <label for="part3text4" class="form-label">Texte 4 du bloc 3</label>
                <textarea class="form-control" id="part3text4" name="part3text4">'; if(isset($data_delivery['part3text4'])) echo $data_delivery['part3text4']; echo '</textarea>
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