<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$caroussel = executeQuery("SELECT * FROM `products` WHERE caroussel = 'oui'");
$bestsellers = executeQuery("SELECT * FROM `products` WHERE bestsellers = 'oui'");
$result = executeQuery("SELECT * FROM `editHome`");
$line = $result->fetch_assoc();
$i = 0;
?>
<main>
    <div id="myCarousel" class="carousel slide border-bottom" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php
            while ($product_caroussel = $caroussel->fetch_assoc()) 
            {
                $active = $i == 0 ? ' active' : ''; // La première image doit avoir la classe "active"
                echo "<div class='carousel-item{$active}'>
                        <div class='container'>
                            <div class='carousel-caption text-black'>
                                <div><a class='text-decoration-none text-black' href='product.php?idProduct={$product_caroussel['idProduct']}'><img src='{$product_caroussel['photo']}' width='150' height='150'></div>
                                <div>
                                    <h1>{$product_caroussel['name']}</h1></a>
                                    <p>{$product_caroussel['sentence']}</p>
                                    <p>{$product_caroussel['price']}€</p>
                                    <p><a class='btn btn-lg btn-outline-success' href='product.php?idProduct={$product_caroussel['idProduct']}'>Plus de détails</a></p>
                                </div>
                            </div>
                        </div>
                      </div>";
                $i++;
            }
            ?>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
        </div> 
        <style>.carousel-indicators [data-bs-target] {background-color: black;}</style>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"><svg viewBox='0 0 16 16' fill='000'><path d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/></svg></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"><svg viewBox='0 0 16 16' fill='000'><path d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/></svg></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>  
    <div class="container marketing">
        <h1 class="text-center">Meileures ventes :</h1>
        <div class="row">
        <?php
            while ($product_bestsellers = $bestsellers->fetch_assoc()) 
            {
                echo "<div class='col-lg-4'>
                        <a class='text-decoration-none text-black' href='product.php?idProduct={$product_bestsellers['idProduct']}'>
                        <img src='{$product_bestsellers['photo']}' width='150' height='150' class='mb-4'>
                        <h2 class='fw-normal'>{$product_bestsellers['name']}</h2></a>
                        <p class='bestsellers-sentence'>{$product_bestsellers['sentence']}</p>
                        <p>{$product_bestsellers['price']} €</p>
                        <p><a class='btn btn-outline-success' href='product.php?idProduct={$product_bestsellers['idProduct']}'>Plus de détails</a></p>
                      </div>";
            }
            ?>
        </div>
        <?php
        $content .="<hr class='featurette-divider'>

                     <div class='row featurette'>
                        <div class='col-md-7'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['title1']}</h2>
                            <p class='lead'>{$line['text1']}</p>
                        </div>
                     </div>

                     <hr class='featurette-divider'>

                     <div class='row featurette'>
                        <div class='col-md-7 order-md-2 text-end'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['title2']}</h2>
                            <p class='lead'>{$line['text2']}</p>
                        </div>
                     </div>

                     <hr class='featurette-divider'>

                     <div class='row featurette'>
                        <div class='col-md-7'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['title3']}</h2>
                            <p class='lead'>{$line['text3']}</p>
                        </div>
                     </div>

                     <hr class='featurette-divider'>

                     <div class='row featurette'>
                        <div class='col-md-7 order-md-2 text-end'>
                            <h2 class='featurette-heading fw-normal lh-1'>{$line['title4']}</h2>
                            <p class='lead'>{$line['text4']}</p>
                        </div>
                     </div>

                     <hr class='featurette-divider'>";
        echo $content;
        ?>
    </div>
</main>
<?php include 'inc/footer.inc.php';?>

