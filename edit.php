<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php'; 
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
            </main>
        </div>
    </div>
</body>
</html>