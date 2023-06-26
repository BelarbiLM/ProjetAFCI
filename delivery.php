<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$result = executeQuery("SELECT * FROM editDelivery");
$line = $result->fetch_assoc();
?>
<main class="delivery">
    <div class="banner"><h2>Livraisons & Retours</h2></div>
    <?php
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
    echo $content;
    ?>
</main>
<?php include 'inc/footer.inc.php';?>