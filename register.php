<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';

if(!empty($_POST))
{
    $checked_register_firstName = preg_match('#^[a-zA-ZÀ-ÿ0-9.\' -]{2,40}$#', $_POST['firstName']);
    $checked_register_lastName = preg_match('#^[a-zA-ZÀ-ÿ0-9.\' -]{2,40}$#', $_POST['lastName']);
    $checked_register_email = preg_match('#^[a-zA-ZÀ-ÿ0-9._,;:?!/*€$&@#()\' -]{1,100}+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,100}$#', $_POST['email']);
    $checked_register_pseudo = preg_match('#^{,50}$#', $_POST['pseudo']);
    $checked_register_pswd = preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$#', $_POST['pswd']);
    
    if (!$checked_register_firstName && !$checked_register_lastName && !$checked_register_email && !$checked_register_pseudo && !$checked_register_pswd )
    {
        $content .= "<div class='requete-error d-flex justify-content-center align-items-center mt-3'>Erreur lors de votre remplissage du formulaire.</div>";
    } else {
        $register_firstName = $_POST['firstName'];
        $register_lastName = $_POST['lastName'];
        $register_email = $_POST['email'];
        $register_pseudo = $_POST['pseudo'];
        $register_pswd = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
        $register_firstName = $mysqli->real_escape_string($register_firstName);
        $register_lastName = $mysqli->real_escape_string($register_lastName);
        $register_email = $mysqli->real_escape_string($register_email);
        $register_pseudo = $mysqli->real_escape_string($register_pseudo);
        $register_pswd = $mysqli->real_escape_string($register_pswd);
        executeQuery("INSERT INTO `admin` (`sexe`, `firstName`, `lastName`, `email`, `pseudo`, `pswd`) 
                      VALUES ('$_POST[sexe]', '$register_firstName', '$register_lastName', '$register_email', '$register_pseudo', '$register_pswd')");
        $content .= "<div class='requete-valid d-flex justify-content-center align-items-center mt-3'>Inscription valide.</div>";
    } 
}
echo $content; 
?>
                <div class="row g-5 justify-content-center my-4">
                    <div class="col-md-7 col-lg-8">
                        <form  method="POST" id="form-register">
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
                                    <input type="email" class="form-control" id="email" name="email" pattern="{,100}" required>
                                </div>
                                <div class="col-12">
                                    <label for="pseudo" class="form-label">Identifiant</label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" pattern="{,50}" required>
                                </div>
                                <div class="col-12">
                                    <label for="pswd" class="form-label">Mot de passe</label>
                                    <input type="text" class="form-control" id="pswd" name="pswd" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" required> 
                                </div>
                                <button class="w-100 btn btn-secondary btn-lg" type="submit">Envoyer</button>
                            </div>
                        </form>
                        <p class="text-center"><small>Le formulaire nécessite la saisie d'un pseudo de maximum 50 caractères ainsi qu'un mot de passe entre 8 et 16 caractères et qui exige qu'il contienne au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial parmi " !@#$%^&*_=+- "</small></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
