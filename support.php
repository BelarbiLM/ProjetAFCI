<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/nav.inc.php'; ?>

    <div class="table-responsive pt-5">
        <table class="table table-dark table-striped table-sm text-center">
            <thead>
                <tr>
                    <th scope="col">En cour de traitement</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td class='processing'>
                        <div class='c-1 d-flex align-items-center justify-content-center'>
                            <div>
                                <i class='bi bi-folder2-open mx-1'></i>
                                <i class="bi bi-x-circle hidden"></i>
                            </div>
                            <div class='contact-date mx-3'>Date de l'envoie du message</div>
                            <div class='contact-sexe'>Civilité</div>
                            <div class='contact-firstName mx-1'>Nom</div>
                            <div class='contact-lastName'>Prenom</div>
                        </div>
                        <div class='contact-mail hidden'>Adresse email : Email</div>
                        <div class='contact-theme hidden'>Objet de la demande : Objet du message</div>
                        <div class='contact-number hidden'>Numéro de commande : Numéro de commande</div>
                        <div class='contact-message hidden'>Message : Contenu du message</div>
                        <form method='post' enctype='multipart/form-data' id='form-archive' class='hidden'>
                            <div>
                                <label for='commentaire' class='form-label'>Commentaire </label>
                                <textarea class='form-control' id='commentaire' name='commentaire' rows='10'></textarea>
                            </div>
                            <button class='w-100 btn btn-primary btn-lg' class='supportArchive'>Archiver</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class='processing'>
                        <div class='c-1 d-flex align-items-center justify-content-center'>
                            <div>
                                <i class='bi bi-folder2-open mx-1'></i>
                                <i class="bi bi-x-circle hidden"></i>
                            </div>
                            <div class='contact-date mx-3'>Date de l'envoie du message</div>
                            <div class='contact-sexe'>Civilité</div>
                            <div class='contact-firstName mx-1'>Nom</div>
                            <div class='contact-lastName'>Prenom</div>
                        </div>
                        <div class='contact-mail hidden'>Adresse email : Email</div>
                        <div class='contact-theme hidden'>Objet de la demande : Objet du message</div>
                        <div class='contact-number hidden'>Numéro de commande : Numéro de commande</div>
                        <div class='contact-message hidden'>Message : Contenu du message</div>
                        <form method='post' enctype='multipart/form-data' id='form-archive' class='hidden'>
                            <div>
                                <label for='commentaire' class='form-label'>Commentaire </label>
                                <textarea class='form-control' id='commentaire' name='commentaire' rows='10'></textarea>
                            </div>
                            <button class='w-100 btn btn-primary btn-lg' class='supportArchive'>Archiver</button>
                        </form>
                    </td>
                </tr>
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
                <tr>
                    <td class='processing'>
                        <div class='c-1 d-flex align-items-center justify-content-center'>
                            <div>
                                <i class='bi bi-folder2-open mx-1'></i>
                                <i class="bi bi-x-circle hidden"></i>
                            </div>
                            <div class='archive-date_archive mx-3'>Date de l'archive</div>
                            <div class='archive-sexe'>Civilité</div>
                            <div class='archive-firstName mx-1'>Nom</div>
                            <div class='archive-lastName'>Prénom</div>
                        </div>
                        <div class='archive-mail hidden'>Adresse email : Email</div>
                        <div class='archive-theme hidden'>Objet de la demande : Objet de la demande</div>
                        <div class='archive-number hidden'>Numéro de commande : Numéro de la commande</div>
                        <div class='archive-message hidden'>Message : Contenue du message</div>
                        <div class='archive-date hidden'>Date du message : date de l'envoie du message</div>
                        <div class='archive-commentaire hidden'>Commentaire : Commentaire écrit avant d'archiver</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<script>
//affichage des details du contact
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

//dissimuler les details du contact
const xIcons = document.querySelectorAll(".bi-x-circle");

xIcons.forEach(icon => {
  icon.addEventListener("click", () => {
    const parent = icon.closest(".processing");
    const hiddenDivs = parent.querySelectorAll(".contact-mail, .contact-theme, .contact-number, .contact-message, #form-archive, .archive-mail, .archive-theme, .archive-number, .archive-message, .archive-date, .archive-commentaire ");
    hiddenDivs.forEach(div => {
      div.classList.add("hidden");
    });
    icon.classList.add("hidden");
    parent.querySelector(".bi-folder2-open").classList.remove("hidden");
  });
});
</script>
</main>
</div>
</div>
</body>
</html>
