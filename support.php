<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';
$data = executeQuery("SELECT * FROM `contact`");
$data2 = executeQuery("SELECT * FROM `archive`"); 
//--- ENREGISTREMENT AUX ARCHIVES ---//
if(!empty($_POST))
{
    $idMessage = $_POST['idMessage'];
    $comment = $_POST['comment'];
    $comment = $mysqli->real_escape_string($comment);
    executeQuery("INSERT INTO `archive` (`idMessage`, `dateArchive`, `sexe`, `firstName`, `lastName`, `email`, `theme`, `number`, `dateContact`, `message`, `comment`)
                SELECT `idMessage`, NOW(), `sexe`, `firstName`, `lastName`, `email`, `theme`, `number`, `date`, `message`, '$comment'
                FROM `contact`
                WHERE `idMessage` = '$idMessage'");
    executeQuery("DELETE FROM `contact` WHERE `idMessage` = '$idMessage'");
    $content .= "<div class='requete-valid d-flex justify-content-center align-items-center mt-3'>Message archiver.</div>";
}

echo $content;
?>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">En cour de traitement</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            while($contact = $data->fetch_assoc())
                            {
                                echo "<tr><td class='processing'>";
                                echo "<div class='c-1 d-flex align-items-center justify-content-center'>";
                                echo "<div><i class='bi bi-folder2-open mx-1'></i><i class='bi bi-x-circle hidden'></i></div>";
                                echo "<div class='contact-date mx-3'>{$contact['date']}</div>";
                                echo "<div class='contact-sexe'>{$contact['sexe']}</div>";
                                echo "<div class='contact-firstName mx-1'>{$contact['firstName']}</div>";
                                echo "<div class='contact-lastName'>{$contact['lastName']}</div>";
                                echo "</div>";
                                echo "<div class='contact-mail hidden'>{$contact['email']}</div>";
                                echo "<div class='contact-theme hidden'>{$contact['theme']}</div>";
                                echo "<div class='contact-number hidden'>{$contact['number']}</div>";
                                echo "<div class='contact-message hidden'>{$contact['message']}</div>";
                                echo "<form method='post' enctype='multipart/form-data' id='form-archive' class='hidden'>";
                                echo "<div><input type='hidden' id='idMessage' name='idMessage' value='{$contact['idMessage']}'>";
                                echo "<label for='comment' class='form-label'>Commentaire </label>";
                                echo "<textarea class='form-control' id='comment' name='comment' rows='10'></textarea>";
                                echo "</div>";
                                echo "<button class='w-100 btn btn-primary btn-lg mt-3'>Archiver</button>";
                                echo "</form></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-success table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">Archive</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php 
                            while($archive = $data2->fetch_assoc())
                            {
                                echo "<tr><td class='processing'>";
                                echo "<div class='c-1 d-flex align-items-center justify-content-center'>";
                                echo "<div><i class='bi bi-folder2-open mx-1'></i><i class='bi bi-x-circle hidden'></i></div>";
                                echo "<div class='archive-dateArchive mx-3'>{$archive['dateArchive']}</div>";
                                echo "<div class='archive-sexe'>{$archive['sexe']}</div>";
                                echo "<div class='archive-firstName mx-1'>{$archive['firstName']}</div>";
                                echo "<div class='archive-lastName'>{$archive['lastName']}</div>";
                                echo "</div>";
                                echo "<div class='archive-mail hidden'>Adresse email : {$archive['email']}</div>";
                                echo "<div class='archive-theme hidden'>Objet de la demande : {$archive['theme']}</div>";
                                echo "<div class='archive-number hidden'>Numéro de commande : {$archive['number']}</div>";
                                echo "<div class='archive-message hidden'>Message : {$archive['message']}</div>";
                                echo "<div class='archive-dateContact hidden'>Date du message : {$archive['dateContact']}</div>";
                                echo "<div class='archive-comment hidden'>Commentaire : {$archive['comment']}</div>";
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
<script>
//----------Affichage des details du contact
const icons = document.querySelectorAll(".bi-folder2-open");

icons.forEach(icon => {
  icon.addEventListener("click", () => {
    const parent = icon.closest(".processing");
    const hiddenDivs = parent.querySelectorAll(".hidden");
    hiddenDivs.forEach(div => {
      div.classList.remove("hidden");
    });
    icon.nextElementSibling.classList.remove("hidden");
  });
});
//----------Dissimuler les details du contact
const xIcons = document.querySelectorAll(".bi-x-circle");

xIcons.forEach(icon => {
  icon.addEventListener("click", () => {
    const parent = icon.closest(".processing");
    const hiddenDivs = parent.querySelectorAll(".contact-mail, .contact-theme, .contact-number, .contact-message, #form-archive, .archive-mail, .archive-theme, .archive-number, .archive-message, .archive-dateContact, .archive-comment ");
    hiddenDivs.forEach(div => {
      div.classList.add("hidden");
    });
    icon.classList.add("hidden");
  });
});
</script>
</html>
