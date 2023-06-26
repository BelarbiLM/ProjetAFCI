<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/header.inc.php';
$result = executeQuery("SELECT * FROM `editObligations`");
$line = $result->fetch_assoc();
?>
<main class="obligations">
    <div class="banner"><h2>Obligations légales</h2></div>
    <div class="legal-obligations d-flex">
        <div class="legal-obligations-menu">
            <ul>
                <li class="li-notice text-decoration-underline">Mentions légales</li>
                <li class="li-terms">Conditions générales de ventes</li>
                <li class="li-cookies">Gestion des cookies</li>
                <li class="li-private-life">Politique de vie privé</li>
            </ul>
        </div>
        <?php
        $content .="<div class='legal-obligations-description'>
                        <div class='notice'>
                            <p>{$line['part1text1']}</p>
                            <p>{$line['part1text2']}</p>
                            <p>{$line['part1text3']}</p>
                            <p>{$line['part1text4']}</p>
                        </div>
                        <div class='terms hidden'>
                            <p>{$line['part2text1']}</p>
                            <p>{$line['part2text2']}</p>
                            <p>{$line['part2text3']}</p>
                            <p>{$line['part2text4']}</p>
                        </div>
                        <div class='cookies hidden'>
                            <p>{$line['part3text1']}</p>
                            <p>{$line['part3text2']}</p>
                            <p>{$line['part3text3']}</p>
                            <p>{$line['part3text4']}</p>
                        </div>
                        <div class='private-life hidden'>
                            <p>{$line['part4text1']}</p>
                            <p>{$line['part4text2']}</p>
                            <p>{$line['part4text3']}</p>
                            <p>{$line['part4text4']}</p>
                        </div>
                        </div>";
        echo $content;
        ?>
    </div>
</main>
<script>
//----------Souslignage des categories du menu 
const liList = document.querySelectorAll('ul li');
liList.forEach(li => {
    li.addEventListener('click', () => {
    liList.forEach(li => {
        li.classList.remove('text-decoration-underline');
    });
    li.classList.add('text-decoration-underline');
    });
});
//----------Affichage des differents textes
$(".li-notice").click(function()
{
    $(".notice").removeClass("hidden");
    $(".terms").addClass("hidden");
    $(".cookies").addClass("hidden");
    $(".private-life").addClass("hidden");
});   
$(".li-terms").click(function()
{
    $(".terms").removeClass("hidden");
    $(".notice").addClass("hidden");
    $(".cookies").addClass("hidden");
    $(".private-life").addClass("hidden");
});   
$(".li-cookies").click(function()
{
    $(".cookies").removeClass("hidden");
    $(".notice").addClass("hidden");
    $(".terms").addClass("hidden");
    $(".private-life").addClass("hidden");
});
$(".li-private-life").click(function()
{
    $(".private-life").removeClass("hidden");
    $(".notice").addClass("hidden");
    $(".terms").addClass("hidden");
    $(".cookies").addClass("hidden");
});
</script>
<?php include 'inc/footer.inc.php';?>