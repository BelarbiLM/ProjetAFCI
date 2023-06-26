<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$result = executeQuery("SELECT * FROM `editContact`");
$line = $result->fetch_assoc();
if(!empty($_POST))
{
    $checked_contact_firstName = preg_match('#^[a-zA-ZÀ-ÿ0-9.\' -]{2,40}$#', $_POST['firstName']);
    $checked_contact_lastName = preg_match('#^[a-zA-ZÀ-ÿ0-9.\' -]{2,40}$#', $_POST['lastName']);
    $checked_contact_email = preg_match('#^[a-zA-ZÀ-ÿ0-9._,;:?!/*€$&@#()\' -]{1,100}+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,100}$#', $_POST['email']);
    $checked_contact_theme = preg_match('#^[a-zA-ZÀ-ÿ0-9._,;:?!/*€$&@#()\' -]{2,40}$#', $_POST['theme']);
    $checked_contact_number = preg_match('#^[0-9]{3,10}$#', $_POST['number']);
    $checked_contact_message = preg_match('#^.{3,10}$#', $_POST['message']);
    
    if (!$checked_contact_firstName && !$checked_contact_lastName && !$checked_contact_email && !$checked_contact_theme && !$checked_contact_number && !$checked_contact_message )
    {
        $content .= "<div class='requete-error d-flex justify-content-center align-items-center mt-3'>Erreur lors du remplissage de votre formulaire.</div>";
        echo $content;
    } else {
        $contact_firstName = $_POST['firstName'];
        $contact_lastName = $_POST['lastName'];
        $contact_email = $_POST['email'];
        $contact_theme = $_POST['theme'];
        $contact_number = $_POST['number'];
        $contact_message = $_POST['message'];
        $contact_firstName = $mysqli->real_escape_string($contact_firstName);
        $contact_lastName = $mysqli->real_escape_string($contact_lastName);
        $contact_email = $mysqli->real_escape_string($contact_email);
        $contact_theme = $mysqli->real_escape_string($contact_theme);
        $contact_number = $mysqli->real_escape_string($contact_number);
        $contact_message = $mysqli->real_escape_string($contact_message);
        executeQuery("INSERT INTO `contact` (`date`, `sexe`, `firstName`, `lastName`, `email`, `theme`, `number`, `message`) 
                      VALUES (NOW(), '$_POST[sexe]', '$contact_firstName', '$contact_lastName', '$contact_email', '$contact_theme', '$contact_number', '$contact_message')");
        $content .= "<div class='requete-valid d-flex justify-content-center align-items-center mt-3'>Le formulaire à bien été envoyer, vous recevrez une réponse d'ici 24h.</div>";
    }
}
?>
<main class="contact">
    <div class="banner"><h2>Nous contacter</h2></div>
    <div class="container marketing"> 
    <?php
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
                    <p class='lead'>{$line['part4text2']}</p>
                 </div>
                 </div>

                 <hr class='featurette-divider'>";
    echo $content;
    ?>

        <div class="contact-form row g-5 justify-content-center mb-4">
            <div class="col-md-7 col-lg-8">
                <div class="text-center">
                    <i class="bi bi-envelope"></i>
                    <h3 class="mb-3">Formulaire :</h3>
                    <p class="mb-3">Réponse par mail d'ici 24h.</p>
                </div>
                <form  method="post" id="form-contact">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="sexe" class="form-label">Sexe</label>
                            <select class="form-select" id="sexe" name="sexe" required>
                                <option value="Mr">Homme</option>
                                <option value="Mme">Femme</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" pattern="{,100}"required>
                        </div>
                        <div class="col-12">
                            <label for="theme" class="form-label">Objet de la demande <span class="text-muted">(Optionel)</span></label>
                            <input type="text" class="form-control" id="theme" name="theme" pattern="[a-zA-ZÀ-ÿ0-9._,;:?!/*€$&@#()' -]{2,40}">
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">Commande n° <span class="text-muted">(Optionel)</span></label>
                            <input type="text" class="form-control" id="number" name="number" pattern="[0-9]{3,10}">
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea class="form-control" id="message" name="message" rows="15" minlength="15" maxlength="500" required></textarea>
                        </div>
                        <button class="w-100 btn btn-secondary btn-lg" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'inc/footer.inc.php';?>