<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$result = executeQuery("SELECT * FROM `editAbout`");
$line = $result->fetch_assoc();
?>
<main class="about">
    <div class="banner"><h2>A propos</h2></div>  
    <?php
    $content .= "<div class='about-div text-center'>
                    <h3>{$line['title']}</h3>
                    <h4>{$line['subtitle']}</h4>
                    <p>{$line['text1']}</p>
                    <p>{$line['text2']}</p>
                    <p>{$line['text3']}</p>
                    <p>{$line['text4']}</p>
                    <p>{$line['text5']}</p>
                    <p>{$line['text6']}</p>
                    <p>{$line['text7']}</p>
                 </div>";
    echo $content;
    ?>
</main>
<?php include 'inc/footer.inc.php';?>
