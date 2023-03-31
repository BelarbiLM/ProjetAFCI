<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/header.inc.php'; ?>

<main>
  <div class='container py-4 my-5'>
    <a href='boutique.php' class='link-dark'>Retour vers la boutique</a>
    <div class='row align-items-md-stretch mt-5'>
      <div class='col-md-6'>
        <div class='h-100 p-5 border rounded-3'>
          <div><img src='' width='150' height='150'></div>
        </div>
      </div>
      <div class='col-md-6'>
        <div class='h-100 p-5 rounded-3'>
          <h1 class='mb-4'>Nom du produit</h1>
          <h4 class='mb-5'>Phrase enjolivante et adjéctiver du produit</h4>
          <ul class='mb-5'>
            <li>Point fort 1</li>
            <li>Point fort 2</li>
            <li>Point fort 3</li>
            <li>Point fort 4</li>
          </ul>

          <div class="stock-full">
            <i>Nombre de produit(s) disponible : ?</i>
            <form method="post" id="form-add-basket">
              <div class="form-add-basket">
                <p>Prix du produit en €</p>
                <div>
                  <label for="quantity">Quantité : </label>
                  <select id="quantity" name="quantity" class="ms-1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <button type="submit" name="add-basket" class="btn btn-outline-success mt-3">Ajouter au panier</button>
              </div>
            </form>
          </div>
        
          <div class="stock-empty hidden">
            <div class="h3 text-center text-danger"><ins>Rupture de stock !</ins></div>
            <div class="text-center text-danger mb-5">Pour plus d\'informations sur la disponibilités d\'un produit veuillez contactez le <a href="' . RACINE_SITE . '/contact.php" class="text-danger">Service Client</a></div>
          </div>

          <ul>
            <li class='text-success'>Livraison Standard gratuite</li>
            <li class='text-success'>Paiement CB ou Paypal</li>
            <li class='text-success'>Expédition dans les 24h de la commande (jours ouvrés)</li>
          </ul>
        </div>
      </div>
    </div>
    <div class='product-description mb-4 rounded-3'>
      <div class='container-fluid py-5'>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget semper turpis. Phasellus lorem eros, efficitur ut diam eu, tristique feugiat nisl. 
        Nunc ligula lacus, faucibus in augue non, imperdiet interdum lorem. Vestibulum id aliquam diam. Etiam rhoncus finibus massa et rhoncus. 
        Praesent justo eros, semper at nibh vitae, ornare eleifend libero. In massa ex, lacinia vitae nisl finibus, ultricies finibus lectus. 
        Integer non tincidunt urna, eget placerat ante. Vestibulum sagittis faucibus nibh eget condimentum. Quisque viverra risus vitae eros ultrices, eu venenatis elit dictum. 
        Maecenas quis elit neque. Quisque viverra ligula commodo, dictum libero ut, malesuada est. In vitae nunc in lacus feugiat congue eget vitae eros. 
        Phasellus dictum arcu id nunc malesuada, ac consectetur velit ornare.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget semper turpis. Phasellus lorem eros, efficitur ut diam eu, tristique feugiat nisl. 
        Nunc ligula lacus, faucibus in augue non, imperdiet interdum lorem. Vestibulum id aliquam diam. Etiam rhoncus finibus massa et rhoncus. 
        Praesent justo eros, semper at nibh vitae, ornare eleifend libero. In massa ex, lacinia vitae nisl finibus, ultricies finibus lectus. 
        Integer non tincidunt urna, eget placerat ante. Vestibulum sagittis faucibus nibh eget condimentum. Quisque viverra risus vitae eros ultrices, eu venenatis elit dictum. 
        Maecenas quis elit neque. Quisque viverra ligula commodo, dictum libero ut, malesuada est. In vitae nunc in lacus feugiat congue eget vitae eros. 
        Phasellus dictum arcu id nunc malesuada, ac consectetur velit ornare.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget semper turpis. Phasellus lorem eros, efficitur ut diam eu, tristique feugiat nisl. 
        Nunc ligula lacus, faucibus in augue non, imperdiet interdum lorem. Vestibulum id aliquam diam. Etiam rhoncus finibus massa et rhoncus. 
        Praesent justo eros, semper at nibh vitae, ornare eleifend libero. In massa ex, lacinia vitae nisl finibus, ultricies finibus lectus. 
        Integer non tincidunt urna, eget placerat ante. Vestibulum sagittis faucibus nibh eget condimentum. Quisque viverra risus vitae eros ultrices, eu venenatis elit dictum. 
        Maecenas quis elit neque. Quisque viverra ligula commodo, dictum libero ut, malesuada est. In vitae nunc in lacus feugiat congue eget vitae eros. 
        Phasellus dictum arcu id nunc malesuada, ac consectetur velit ornare.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget semper turpis. Phasellus lorem eros, efficitur ut diam eu, tristique feugiat nisl. 
        Nunc ligula lacus, faucibus in augue non, imperdiet interdum lorem. Vestibulum id aliquam diam. Etiam rhoncus finibus massa et rhoncus. 
        Praesent justo eros, semper at nibh vitae, ornare eleifend libero. In massa ex, lacinia vitae nisl finibus, ultricies finibus lectus. 
        Integer non tincidunt urna, eget placerat ante. Vestibulum sagittis faucibus nibh eget condimentum. Quisque viverra risus vitae eros ultrices, eu venenatis elit dictum. 
        Maecenas quis elit neque. Quisque viverra ligula commodo, dictum libero ut, malesuada est. In vitae nunc in lacus feugiat congue eget vitae eros. 
        Phasellus dictum arcu id nunc malesuada, ac consectetur velit ornare.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget semper turpis. Phasellus lorem eros, efficitur ut diam eu, tristique feugiat nisl. 
        Nunc ligula lacus, faucibus in augue non, imperdiet interdum lorem. Vestibulum id aliquam diam. Etiam rhoncus finibus massa et rhoncus. 
        Praesent justo eros, semper at nibh vitae, ornare eleifend libero. In massa ex, lacinia vitae nisl finibus, ultricies finibus lectus. 
        Integer non tincidunt urna, eget placerat ante. Vestibulum sagittis faucibus nibh eget condimentum. Quisque viverra risus vitae eros ultrices, eu venenatis elit dictum. 
        Maecenas quis elit neque. Quisque viverra ligula commodo, dictum libero ut, malesuada est. In vitae nunc in lacus feugiat congue eget vitae eros. 
        Phasellus dictum arcu id nunc malesuada, ac consectetur velit ornare.</p>
      </div>
    </div>
  </div>
</main>

<?php include 'inc/footer.inc.php';?>