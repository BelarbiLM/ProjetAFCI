<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php';
$result_waiting = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'À Envoyer'");
$result_transit = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'En transit'");
$result_finish = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'Terminer'");
$num_waiting = mysqli_num_rows($result_waiting);
$num_transit = mysqli_num_rows($result_transit);
$num_finish = mysqli_num_rows($result_finish);
$total_order = $num_waiting + $num_transit + $num_finish;
$waiting_order = $result_waiting->fetch_assoc();
$transit_order = $result_transit->fetch_assoc();
$headers = 'From: admin001@projet-afci-ecommerce-leo.fr' . "\r\n";
if(isset($_POST['submit-waiting']) && isset($_POST['id-waiting']))
{
    $trackingNumber = $_POST['trackingNumber'];
    $id_waiting = $_POST['id-waiting'];
    executeQuery("UPDATE `order` SET `statusDelivery` = 'En transit', `trackingNumber` = '$trackingNumber' WHERE `idOrder` = $id_waiting");
    $message = "Nous vous remercions d'avoir choisi notre entreprise pour effectuer votre achat. Nous sommes heureux de vous informer que votre commande a été traitée et expédiée avec succès. Le numéro de suivi de votre colis est le $trackingNumber, vous pouvez suivre en temps réel l'avancement de votre livraison. Nous prenons très au sérieux la qualité de notre service et veillons à ce que nos clients soient satisfaits à tous les niveaux. Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter. Nous serons ravis de vous aider à tout moment. Encore une fois, merci pour votre confiance et nous espérons que vous apprécierez votre commande.";
    mail($waiting_customer['email'], "Confirmation d'envoi", $message, $headers);    
}

if(isset($_POST['submit-transit']) && isset($_POST['id-transit']))
{
    $trackingNumber = $_POST['trackingNumber'];
    $id_transit = $_POST['id-transit'];
    executeQuery("UPDATE `order` SET `statusDelivery` = 'Terminer' WHERE `idOrder` = $id_transit");
    $message = "Nous sommes heureux de vous informer que votre commande a été livrée avec succès. Le numéro de suivi de votre colis est le $trackingNumber. Nous espérons que vous avez reçu votre commande en bon état et que vous êtes satisfait(e) de votre achat. Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter. Merci de votre confiance et nous espérons vous revoir bientôt !";
    mail($waiting_customer['email'], "Confirmation d'envoi", $message, $headers);    
}
?>
                <div class="d-flex flex-column align-items-center justify-content-center mx-auto ">
                    <table class="table table-bordered mt-5">
                        <tr>
                            <td>En attente</td>
                            <td><?php echo $num_waiting; ?></td>
                        </tr>
                        <tr>
                            <td>En transit</td>
                            <td><?php echo $num_transit; ?></td>
                        </tr>
                        <tr>
                            <td>Terminer</td>
                            <td><?php echo $num_finish; ?></td>
                        </tr>
                        <tr>
                            <td>Commandes totales</td>
                            <td><?php echo $total_order; ?></td>
                        </tr>
                    </table>
                </div>
                <p>À Envoyer</p>
                <div class="table-responsive table-order border-top">
                    <table class="table table-striped caption-top">
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
                                <?php
                                $result_waiting = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'À Envoyer'");
                                while($waiting_order = $result_waiting->fetch_assoc())
                                {
                                    $result_retailCustomer = executeQuery("SELECT * FROM `retailCustomer` WHERE idOrder = '{$waiting_order['idOrder']}'");
                                    $waiting_customer = $result_retailCustomer->fetch_assoc();
                                    $waiting .= "<form method='post' name='form-waiting'><tr>
                                                        <td>#{$waiting_order['idOrder']}</td>
                                                        <td>{$waiting_order['statusDelivery']}</td>
                                                        <td>{$waiting_customer['sexe']} {$waiting_customer['firstName']} {$waiting_customer['lastName']}</td>
                                                        <td>{$waiting_customer['phone']}<br>{$waiting_customer['email']}</td>
                                                        <td>{$waiting_customer['address']}, {$waiting_customer['zip']}, {$waiting_customer['city']}</td>
                                                        <td>{$waiting_customer['address2']}</td>
                                                        <td><input type='text' name='trackingNumber' required></td>
                                                        <td>
                                                            <input type='hidden' name='id-waiting' value='{$waiting_order['idOrder']}'>
                                                            <button type='submit' name='submit-waiting' class='btn btn-outline-success'>Envoyer</button>
                                                        </td>
                                                    </tr>
                                                 </form>";
                                }
                                echo $waiting;
                                ?>
                            </tbody>
                        </table>
                </div>
                <p>En Transit</p>
                <div class="table-responsive table-order border-top">
                    <table class="table table-striped caption-top">
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
                        <?php
                                $result_transit = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'En transit'");
                                while($transit_order = $result_transit->fetch_assoc())
                                {
                                    $result_retailCustomer = executeQuery("SELECT * FROM `retailCustomer` WHERE idOrder = '{$transit_order['idOrder']}'");
                                    $transit_customer = $result_retailCustomer->fetch_assoc();
                                    $transit .= "<form method='post' name='form-transit'><tr>
                                                    <td>#{$transit_order['idOrder']}</td>
                                                    <td>{$transit_order['statusDelivery']}</td>
                                                    <td>{$transit_customer['sexe']} {$transit_customer['firstName']} {$transit_customer['lastName']}</td>
                                                    <td>{$transit_customer['phone']}<br>{$transit_customer['email']}</td>
                                                    <td>{$transit_customer['address']}, {$transit_customer['zip']}, {$transit_customer['city']}</td>
                                                    <td>{$transit_customer['address2']}</td>
                                                    <td>{$transit_order['trackingNumber']}</td>
                                                    <td>
                                                        <input type='hidden' name='id-transit' value='{$transit_order['idOrder']}'>
                                                        <button type='submit' name='submit-transit' class='btn btn-outline-success'>Envoyer</button>
                                                    </td>
                                                 </tr></form>";
                                }
                                echo $transit;
                                ?>
                        </tbody>
                    </table>
                </div>
                <p>Terminer</p>
                <div class="table-responsive table-order border-top">
                    <table class="table table-striped caption-top">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N° de commande</th>
                                <th scope="col">Mode de livraison</th>
                                <th scope="col">Client</th>
                                <th scope="col">Coordonnées</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Détails</th>
                                <th scope="col">N° d'envoie</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php
                            $result_finish = executeQuery("SELECT * FROM `order` WHERE statusDelivery = 'Terminer'");
                            while($finish_order = $result_finish->fetch_assoc()) 
                            {
                                $result_retailCustomer = executeQuery("SELECT * FROM `retailCustomer` WHERE idOrder = '{$finish_order['idOrder']}'");
                                $finish_customer = $result_retailCustomer->fetch_assoc();
                                $finish .= "<tr>
                                                <td>#{$finish_order['idOrder']}</td>
                                                <td>{$finish_order['statusDelivery']}</td>
                                                <td>{$finish_customer['sexe']} {$finish_customer['firstName']} {$finish_customer['lastName']}</td>
                                                <td>{$finish_customer['phone']}<br>{$finish_customer['email']}</td>
                                                <td>{$finish_customer['address']}, {$finish_customer['zip']}, {$finish_customer['city']}</td>
                                                <td>{$finish_customer['address2']}</td>
                                                <td>{$finish_order['trackingNumber']}</td>
                                             </tr>";
                            }
                            echo $finish;
                        ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
