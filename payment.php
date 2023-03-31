<?php include 'inc/init.inc.php';?>
<?php include 'inc/head.inc.php';?>

<header class="p-3">
    <div class="container text-white d-flex">
        <p class="mb-0">France (€)</p>
        <a href="<?php echo RACINE_SITE; ?>contact.php" class="text-decoration-none text-white mb-0"><i class="bi bi-telephone"></i> Service Client</a>
    </div>
</header>

<main class="payment">
    <div class="payment-div d-flex">
        
        <div class="payment-zone-1">
            <div class="container">  
                <div class="payment-form row g-5 justify-content-center mb-4">
                    <div class="col-md-7 col-lg-8">
                        <form method="post" id="form-payment">
                            <h4 class="justify-content-center mb-3">COORDONNÉES, ÉXPÉDITION ET LIVRAISON</h4>

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
                                        <label for="address" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="address" name="address" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address2" class="form-label">Adresse 2 <span class="text-muted">(Optionnel)</span></label>
                                        <input type="text" class="form-control" id="address2" name="address2" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}" placeholder="Étage, esc, bat">
                                    </div>
                                    <div class="col-12">
                                        <label for="country" class="form-label">Pays</label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option>France</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" class="form-label">Ville</label>
                                        <input type="text" class="form-control" id="city" name="city" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,50}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">Code postale</label>
                                        <input type="text" class="form-control" id="zip" name="zip" pattern="[0-9]{5}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" pattern="{,100}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="phone" class="form-label">Télephone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="01 23 45 67 89" pattern="[0-9]{10}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="delivery" class="form-label">Mode de livraison</label>
                                        <select class="form-select" id="delivery" name="delivery" required>
                                            <option value="standard">Standard (3 à 4 jours ouvrés) : Offert</option>
                                            <option value="express">Express (1 à 2 jurs ouvrés) : 9,95€</option>
                                        </select>
                                    </div>    
                                </div>

                            <hr class="my-4">

                            <h4 class="justify-content-center mb-3">FACTURATION ET PAIEMENT</h4> 

                            <h5 class="d-flex mt-3">Adresse de facturation</h5>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="same-address" checked>
                                    <label class="form-check-label" for="same-address">L'adresse de livraison est la même que mon adresse de facturation</label>
                                </div>
                                <div class="factu-change hidden">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="factu-sexe" class="form-label">Sexe</label>
                                            <select class="form-select" id="factu-sexe" name="factu-sexe" required>
                                                <option value="Mr">Homme</option>
                                                <option value="Mme">Femme</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="factu-firstName" class="form-label">Prénom</label>
                                            <input type="text" class="form-control" id="factu-firstName" name="factu-firstName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="factu-lastName" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="factu-lastName" name="factu-lastName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="factu-address" class="form-label">Adresse</label>
                                            <input type="text" class="form-control" id="factu-address" name="factu-address" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="factu-address2" class="form-label">Adresse 2 <span class="text-muted">(Optionnel)</span></label>
                                            <input type="text" class="form-control" id="factu-address2" name="factu-address2" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}" placeholder="Étage, esc, bat">
                                        </div>
                                        <div class="col-12">
                                            <label for="factu-country" class="form-label">Pays</label>
                                            <select class="form-select" id="factu-country" name="factu-country" required>
                                                <option>France</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="factu-city" class="form-label">Ville</label>
                                            <input type="text" class="form-control" id="factu-city" name="factu-city" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,50}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="factu-zip" class="form-label">Code postale</label>
                                            <input type="text" class="form-control" id="factu-zip" name="factu-zip" pattern="[0-9]{5}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="factu-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="factu-email" name="factu-email" pattern="{,100}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="factu-phone" class="form-label">Télephone</label>
                                            <input type="text" class="form-control" id="factu-phone" name="factu-phone" placeholder="01 23 45 67 89" pattern="[0-9]{10}" required>
                                        </div>
                                    </div>
                                </div>
                        
                            <h5 class="d-flex mt-3">Paiement</h5>
                                <div class="my-3">
                                    <div class="form-check">
                                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" required>
                                        <label class="form-check-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                        <label class="form-check-label" for="paypal">PayPal</label>
                                    </div>
                                </div>

                                <div class="credit-hidden">
                                    <div class="row gy-3 mb-3">                
                                        <div class="col-md-6">
                                            <label for="cc-name" class="form-label">Nom sur la carte</label>
                                            <input type="text" class="form-control" id="cc-name" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cc-number" class="form-label">Numéro de carte</label>
                                            <input type="text" class="form-control" id="cc-number" pattern="[0-9]{16}" required>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cc-expiration" class="form-label">Expiration</label>
                                            <input type="text" class="form-control" id="cc-expiration" pattern="[0-9/]{6}" required>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cc-cvv" class="form-label">CVV</label>
                                            <input type="text" class="form-control" id="cc-cvv" pattern="[0-9]{3}" required>
                                        </div>
                                    </div>
                                    <p class="payment-detail">
                                        En cliquant sur «Payer», je confirme avoir lu et accepté <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions générales de vente</a> et j'accepte le traitement de mes données personnelles dans les thermes énoncés des <a href="<?php echo RACINE_SITE; ?>obligations.php">conditions générales de vente</a>, 
                                        dans les objectifs détaillés de votre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a> et dans la gestion de ma commande. Si j'ai moins de 16 ans, je confirme avoir le consentement parental pour divulguer mes données personnelles. 
                                        Conformément aux lois et réglementations en vigueur, vous avez le droit d'accéder, de corriger et de supprimer toutes les données qui peuvent vous concerner. Vous pouvez également nous demander de ne pas vous envoyer de communications personnalisées sur nos produits et services. 
                                        Ce droit peut être exercé à tout moment en nous envoyant un avis à notre section Contact dans notre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a>.
                                    </p>
                                    <button class="w-100 btn btn-secondary btn-lg" type="submit">Payer</button>
                                </div>

                                <div class="paypal-hidden">
                                    <p class="payment-detail">
                                        En cliquant sur «Payer», je confirme avoir lu et accepté <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions générales de vente</a> et j'accepte le traitement de mes données personnelles dans les thermes énoncés des <a href="<?php echo RACINE_SITE; ?>obligations.php">conditions générales de vente</a>, 
                                        dans les objectifs détaillés de votre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a> et dans la gestion de ma commande. Si j'ai moins de 16 ans, je confirme avoir le consentement parental pour divulguer mes données personnelles. 
                                        Conformément aux lois et réglementations en vigueur, vous avez le droit d'accéder, de corriger et de supprimer toutes les données qui peuvent vous concerner. Vous pouvez également nous demander de ne pas vous envoyer de communications personnalisées sur nos produits et services. 
                                        Ce droit peut être exercé à tout moment en nous envoyant un avis à notre section Contact dans notre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a>.
                                    </p>
                                    <button class="w-100 btn btn-secondary btn-lg" type="submit">Se rediriger vers PayPal et payer</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="payment-zone-2">

            <div class="col basket-product">
                <div class="card">
                    <div class="card-img-top"></div>
                    <div class="card-body text-center">
                        <p class="card-text">Nom du produit</p>
                        <p class="card-text">50,00€</p>
                        <form method="post" id="form-2" class="d-flex justify-content-center align-items-center flex-column">
                            <div>
                                <label for="quantity">Quantité : </label>
                                <select name="quantity" id="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img-top"></div>
                    <div class="card-body text-center">
                        <p class="card-text">Nom du produit</p>
                        <p class="card-text">50,00€</p>
                        <form method="post" id="form-2" class="d-flex justify-content-center align-items-center flex-column">
                            <div>
                                <label for="quantity">Quantité : </label> <!--grace au form afficher le produit avec le nb demander lors de lajout au panier-->
                                <select name="quantity" id="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img-top"></div>
                    <div class="card-body text-center">
                        <p class="card-text">Nom du produit</p>
                        <p class="card-text">50,00€</p>
                        <form method="post" id="form-2" class="d-flex justify-content-center align-items-center flex-column">
                            <div>
                                <label for="quantity">Quantité : </label>
                                <select name="quantity" id="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div>
                <table class="table table-hover" cellpadding="10">
                    <tbody class="table-group-divider">
                        <tr>
                            <th>Sous-total</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Livraison</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Taxes incluses</th>
                            <td>-</td>
                        </tr>
                    </tbody>
                    <tfoot class="table-group-divider">
                        <tr>
                            <th>Total</th>
                            <td>-</td>
                        </tr>
                    </tfoot>
                </table>  
                <p class="table-detail">Total calculé après choix de la methode de livraison</p>  
            </div>
        
            <div class="basket-service p-3 text-center">
                <h5>BESOIN D'AIDE ?</h5>
                <p>Le <a href="<?php echo RACINE_SITE; ?>contact.php">Service Client</a> est à votre disposition du lundi au dimanche de 9h à 20h.</p>
                <div class="d-flex align-items-center justify-content-center"><h5><i class="bi bi-credit-card"></i>  PAIEMENT 100 % SÉCURISÉ</h5></div>
                <p>Les données de votre carte bancaire sont envoyées de manière sécurisée. Toutes les informations sont protégées à l'aide de la technologie Secure Sockets Layer (SSL).</p>
            </div>        
        </div>
        
    </div>
</main>
<script>
//adresse de facturation 
const sameAddressCheckbox = document.getElementById('same-address');
const factuAddressDiv = document.querySelector('.factu-change');

sameAddressCheckbox.addEventListener('change', () => {
    if (!sameAddressCheckbox.checked) {
        factuAddressDiv.classList.remove('hidden');
    } else {
        factuAddressDiv.classList.add('hidden');
    }
});

//mode de paiement
function togglePaymentMethod() {
    const creditRadio = document.getElementById('credit');
    const paypalRadio = document.getElementById('paypal');
    const creditSelection = document.querySelector('.credit-hidden');
    const creditSelectionBtn = document.querySelector('.credit-hidden');
    const paypalSelection = document.querySelector('.paypal-hidden');

    if (creditRadio.checked) {
        creditSelection.style.display = 'block';
        paypalSelection.style.display = 'none';
    } else if (paypalRadio.checked) {
        creditSelection.style.display = 'none';
        paypalSelection.style.display = 'block';
    }
}
document.querySelectorAll('input[name="paymentMethod"]').forEach(function(elem) {
    elem.addEventListener("change", togglePaymentMethod);
});
</script>

<?php include 'inc/footer.inc.php';?>