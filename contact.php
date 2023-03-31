<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/header.inc.php'; ?>

<main class="contact">
    <div class="banner"><h2>Nous contacter</h2></div>
    <div class="container marketing">

        <h4 class='text-center my-5'>Nos conseillers sont à votre écoute et vous réservent un accueil personnalisé.</h4>

        <div class='row featurette'>
            <div class='col-md-7'>
                <div class='contact-detail-1'>
                    <h2 class='featurette-heading fw-normal lh-1'>Par Téléphone</h2>
                    <i class='bi bi-telephone-forward'></i>
                </div>
                <p class='lead'>+ 33 1 01 01 01 01</p>
                <p class='lead'>Nous sommes disponibles du lundi au vendredi de 9h à 20h</p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7 order-md-2 text-end'>
                <div class='contact-detail-2-right'>
                    <i class='bi bi-at'></i>
                    <h2 class='featurette-heading fw-normal lh-1'>Par Email</h2>
                </div>
                <p class='lead'>Via le formulaire de contact si dessous</p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7'>
                <div class='contact-detail-1'>
                    <h2 class='featurette-heading fw-normal lh-1'>Par What's app</h2>
                    <i class='bi bi-whatsapp'></i>
                </div>
                <p class='lead'>+ 33 6 06 06 06 06</p><!--ajouter un modal sur version mobile-->
                <p class='lead'>Nous sommes disponibles du lundi au dimanche de 9h a 20h</p>
            </div>
        </div>

        <hr class='featurette-divider'>
        <hr class='featurette-divider'>

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
                        <input type="text" class="form-control" id="number" name="theme" pattern="[0-9]{3,10}"><!--mettre le bon nb de chifres en fonction de l'attribution du num de commande -->
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
</main>

<?php include 'inc/footer.inc.php';?>