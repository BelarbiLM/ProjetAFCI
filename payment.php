<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
verifyAccessPayment();

if(!empty($_POST))
{ 
    $deliveryAmount = $_POST['typeDelivery'] === "standard" ? 0 : 9.95;
    $productsAmount = productsAmount(); 
    $totalAmount = $deliveryAmount + $productsAmount;
    $headers = 'From: admin001@projet-afci-ecommerce-leo.fr' . "\r\n";
    executeQuery("INSERT INTO `order` (`dateOrder`, `typeDelivery`, `amount`, `statusDelivery`, `trackingNumber`) VALUES (NOW(),'$_POST[typeDelivery]','$totalAmount','À Envoyer', '')");
    $id_order = $mysqli->insert_id; 
    executeQuery("INSERT INTO retailCustomer (`idOrder`, `sexe`, `firstName`, `lastName`, `address`, `address2`, `country`, `city`, `zip`, `email`, `phone`, `factuSexe`, `factuFirstName`, `factuLastName`, `factuAddress`, `factuAddress2`, `factuCountry`, `factuCity`, `factuZip`, `factuEmail`, `factuPhone`) VALUES ($id_order, '$_POST[sexe]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[address]', '$_POST[address2]', '$_POST[country]', '$_POST[city]', '$_POST[zip]', '$_POST[email]', '$_POST[phone]', '$_POST[factuSexe]', '$_POST[factuFirstName]', '$_POST[factuLastName]', '$_POST[factuAddress]', '$_POST[factuAddress2]', '$_POST[factuCountry]', '$_POST[factuCity]', '$_POST[factuZip]', '$_POST[factuEmail]', '$_POST[factuPhone]')");
    for($i = 0; $i < count($_SESSION['basket']['idProduct']); $i++) 
    {
        $productId = $_SESSION['basket']['idProduct'][$i];
        $quantity = $_SESSION['basket']['stock'][$i];
        executeQuery("INSERT INTO `retailOrder` (`idOrder`, `idProduct`, `name`, `price`, `quantity`) VALUES ($id_order, $productId,'" . $_SESSION['basket']['name'][$i] . "'," . $_SESSION['basket']['price'][$i] . ", $quantity)");
        executeQuery("UPDATE `products` SET stock = stock - $quantity WHERE idProduct = $productId"); 
    }
    mail($_POST['email'], "Confirmation de la commande", "Nous vous remercions pour votre achat et confirmons la bonne réception de votre paiement. Votre commande a été envoyée dans les plus brefs délais. Votre numéro de suivi est le $id_order. N'hésitez pas à nous contacter si vous avez des questions ou des préoccupations.", $headers); 

    header("Location: valid.php?idOrder=$id_order"); 
    unset($_SESSION['basket']);
}
?>
<header class="p-3 header-payment">
    <div class="container text-white d-flex">
        <p class="mb-0">France (€)</p>
        <a href="<?php echo RACINE_SITE; ?>contact.php" class="text-decoration-none text-white mb-0"><i class="bi bi-telephone"></i> Service Client</a>
        <a href="<?php echo RACINE_SITE; ?>basket.php" class="text-decoration-none text-white mb-0"><i class="bi bi-basket"></i> Panier</a>
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
                                    <label for="typeDelivery" class="form-label">Mode de livraison</label>
                                    <select class="form-select" id="typeDelivery" name="typeDelivery" required>
                                        <option value="">Choisir une option</option>
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
                                        <label for="factuSexe" class="form-label">Sexe</label>
                                        <select class="form-select" id="factuSexe" name="factuSexe">
                                            <option value="Mr">Homme</option>
                                            <option value="Mme">Femme</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="factuFirstName" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="factuFirstName" name="factuFirstName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="factuLastName" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="factuLastName" name="factuLastName" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}">
                                    </div>
                                    <div class="col-12">
                                        <label for="factuAddress" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="factuAddress" name="factuAddress" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}">
                                    </div>
                                    <div class="col-12">
                                        <label for="factuAddress2" class="form-label">Adresse 2 <span class="text-muted">(Optionnel)</span></label>
                                        <input type="text" class="form-control" id="factuAddress2" name="factuAddress2" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,60}" placeholder="Étage, esc, bat">
                                    </div>
                                    <div class="col-12">
                                        <label for="factuCountry" class="form-label">Pays</label>
                                        <select class="form-select" id="factuCountry" name="factuCountry">
                                            <option>France</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="factuCity" class="form-label">Ville</label>
                                        <input type="text" class="form-control" id="factuCity" name="factuCity" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,50}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="factuZip" class="form-label">Code postale</label>
                                        <input type="text" class="form-control" id="factuZip" name="factuZip" pattern="[0-9]{5}">
                                    </div>
                                    <div class="col-12">
                                        <label for="factuEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="factuEmail" name="factuEmail" pattern="{,100}">
                                    </div>
                                    <div class="col-12">
                                        <label for="factuPhone" class="form-label">Télephone</label>
                                        <input type="text" class="form-control" id="factuPhone" name="factuPhone" placeholder="01 23 45 67 89" pattern="[0-9]{10}">
                                    </div>
                                </div>
                            </div>
                
                            <h5 class="d-flex mt-3">Paiement</h5>
                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input">
                                    <label class="form-check-label" for="credit">Credit card</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                </div>
                            </div>

                            <div class="credit-hidden">
                                <div class="row gy-3 mb-3">                
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Nom sur la carte</label>
                                        <input type="text" class="form-control" id="cc-name" pattern="[a-zA-ZÀ-ÿ0-9.' -]{2,40}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">Numéro de carte</label>
                                        <input type="text" class="form-control" id="cc-number" pattern="[0-9]{16}">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" pattern="[0-9/]{6}">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" pattern="[0-9]{3}">
                                    </div>
                                </div>
                                <p class="payment-retail">
                                    En cliquant sur «Payer», je confirme avoir lu et accepté <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions générales de vente</a> et j'accepte le traitement de mes données personnelles dans les thermes énoncés des <a href="<?php echo RACINE_SITE; ?>obligations.php">conditions générales de vente</a>, 
                                    dans les objectifs détaillés de votre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a> et dans la gestion de ma commande. Si j'ai moins de 16 ans, je confirme avoir le consentement parental pour divulguer mes données personnelles. 
                                    Conformément aux lois et réglementations en vigueur, vous avez le droit d'accéder, de corriger et de supprimer toutes les données qui peuvent vous concerner. Vous pouvez également nous demander de ne pas vous envoyer de communications personnalisées sur nos produits et services. 
                                    Ce droit peut être exercé à tout moment en nous envoyant un avis à notre section Contact dans notre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a>.
                                </p>
                                <button class="w-100 btn btn-secondary btn-lg" type="submit" id="payment">Payer</button>
                            </div>

                            <div class="paypal-hidden">
                                <p class="payment-retail">
                                    En cliquant sur «Payer», je confirme avoir lu et accepté <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions générales de vente</a> et j'accepte le traitement de mes données personnelles dans les thermes énoncés des <a href="<?php echo RACINE_SITE; ?>obligations.php">conditions générales de vente</a>, 
                                    dans les objectifs détaillés de votre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a> et dans la gestion de ma commande. Si j'ai moins de 16 ans, je confirme avoir le consentement parental pour divulguer mes données personnelles. 
                                    Conformément aux lois et réglementations en vigueur, vous avez le droit d'accéder, de corriger et de supprimer toutes les données qui peuvent vous concerner. Vous pouvez également nous demander de ne pas vous envoyer de communications personnalisées sur nos produits et services. 
                                    Ce droit peut être exercé à tout moment en nous envoyant un avis à notre section Contact dans notre <a href="<?php echo RACINE_SITE; ?>obligations.php">Déclaration de Confidentialité</a>.
                                </p>
                                <button class="w-100 btn btn-secondary btn-lg" type="submit" id="payment">Se rediriger vers PayPal et payer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-zone-2">
            <div class="col basket-product">
                <?php
                for($i = 0; $i < count($_SESSION['basket']['idProduct']); $i++)
                {
                    $id_product_basket = $_SESSION['basket']['idProduct'][$i];
                    $path_photo = executeQuery("SELECT photo FROM `products` WHERE idProduct = '$id_product_basket'");
                    $id_product_basket_path_photo = $path_photo->fetch_assoc();
                    $content_photo = $id_product_basket_path_photo['photo'];
                    echo "<div class='card'>
                            <div class='w-50 m-3'><a class='text-decoration-none text-black' href='product.php?idProduct={$_SESSION['basket']['idProduct'][$i]}'><img src='$content_photo' width='100%' height='100%'></div>
                            <div class='card-body text-center w-50 d-flex justify-content-center flex-column'>
                                <p class='card-text'>{$_SESSION['basket']['name'][$i]}</p></a>
                                <p class='card-text'>{$_SESSION['basket']['price'][$i]} €</p>
                                <p class='card-text'>Quantité : {$_SESSION['basket']['stock'][$i]}</p>
                            </div>
                            </div>";
                }
                ?>
            </div>
            <div>
                <table class="table table-hover" cellpadding="10">
                    <tbody class="table-group-divider">
                        <tr>
                            <th>Sous-total</th>
                            <td><?php echo productsAmount(); ?> €</td>
                        </tr>
                        <tr>
                            <th>Livraison</th>
                            <td id="priceDelivery"></td>
                        </tr>
                        <tr>
                            <th>Taxes incluses</th>
                            <td>-</td>
                        </tr>
                    </tbody>
                    <tfoot class="table-group-divider">
                        <tr>
                            <th>Total</th>
                            <td id="totalAmount"></td>
                        </tr>
                    </tfoot>
                </table>  
                <p class="d-flex justify-content-center">Total calculé après choix de la methode de livraison</p>  
            </div>
            <div class="basket-service p-3 text-center">
                <h5>BESOIN D'AIDE ?</h5>
                <p>Le <a href="<?php echo RACINE_SITE; ?>contact.php">Service Client</a> est à votre disposition du lundi au dimanche de 9h à 20h.</p>
                <div class="d-flex align-items-center justify-content-center"><h5><i class="bi bi-credit-card"></i>  PAIEMENT 100 % SÉCURISÉ</h5></div>
                <p>Les données de votre carte bancaire sont envoyées de manière sécurisée. Toutes les informations sont protégées à l'aide de la technologie Secure Sockets Layer (SSL).</p>
            </div>        
        </div>
    </div>
<script>
//----------Adresse de facturation 
const sameAddressCheckbox = document.getElementById('same-address');
const factuAddressDiv = document.querySelector('.factu-change');

sameAddressCheckbox.addEventListener('change', () => {
    if (!sameAddressCheckbox.checked) {
        factuAddressDiv.classList.remove('hidden');
    } else {
        factuAddressDiv.classList.add('hidden');
    }
});
//----------Mode de paiement
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
//----------Récuperation du mode de livraison pour le montant total 
function calculateDeliveryAmount() {
    var typeDelivery = document.getElementById("typeDelivery").value;
    var priceElement = document.getElementById("priceDelivery");
    if (typeDelivery === "standard") {
        priceElement.innerHTML = "0 €";
        return 0;
    } else if (typeDelivery === "express") {
        priceElement.innerHTML = "9.95 €";
        return 9.95;
    } else {
        priceElement.innerHTML = "-";
        return 0;
    }
}

document.getElementById("typeDelivery").addEventListener("change", function() {
    var totalAmountElement = document.getElementById("totalAmount");
    totalAmountElement.innerHTML = calculateTotalAmount().toFixed(2) + " €";
});

function calculateTotalAmount() {
    var deliveryAmount = calculateDeliveryAmount();
    var productsAmount = <?php echo json_encode(productsAmount()); ?>;
    var totalAmount = deliveryAmount + productsAmount;
    return totalAmount;
}

var totalAmountElement = document.getElementById("totalAmount");
totalAmountElement.innerHTML = calculateTotalAmount().toFixed(2) + " €";
</script>
</main>
<?php include 'inc/footer.inc.php';?>