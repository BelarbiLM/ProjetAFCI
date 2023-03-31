<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/nav.inc.php'; ?>

    <div class="d-flex flex-column align-items-center justify-content-center mx-auto ">
        <table class="table table-bordered mt-5">
            <tr>
                <td>En attente</td>
                <td>0</td>
            </tr>
            <tr>
                <td>En transit</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Terminer</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Commandes totales</td>
                <td>0</td>
            </tr>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-striped caption-top">
            <caption>À envoyer</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">N° de commande</th>
                    <th scope="col">Mode de livraison</th>
                    <th scope="col">Client</th>
                    <th scope="col">Coordonnées</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Détails</th>
                    <th scope="col">N° d'envoie</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>#00001</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00001</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <form action="get">
                    <td><input type="text" name="" id=""></td>
                    <td><button type="button" class="btn btn-outline-success">Envoyer</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-striped caption-top">
            <caption>En transit</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">N° de commande</th>
                    <th scope="col">Mode de livraison</th>
                    <th scope="col">Client</th>
                    <th scope="col">Coordonnées</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Détails</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>#00001</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00001</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                    <td><button type="button" class="btn btn-outline-success">Livrer</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-striped caption-top">
            <caption>Terminer</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">N° de commande</th>
                    <th scope="col">Mode de livraison</th>
                    <th scope="col">Client</th>
                    <th scope="col">Coordonnées</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Détails</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>#00001</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00001</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00002</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00003</td>
                    <td>Standard</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
                <tr>
                    <td>#00004</td>
                    <td>Express</td>
                    <td>Mr Jean Dupont</td>
                    <td>+336123456789 email@email.com</td>
                    <td>4 place des Ternes, 75008, Paris</td>
                    <td>Esc 1, Étage 1, Porte 1, sonner a Dupuit</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
</body>
</html>
