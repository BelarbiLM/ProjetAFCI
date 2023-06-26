<?php
//--- BDD ---//
//----------(Connexion à la base de données MySQL. Si la connexion échoue, un message d'erreur sera affiché.)
$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "eCommerce";
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8mb4");
if($mysqli->connect_error) 
{ 
    die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error); 
}
//--- CHEMIN ---//
define("RACINE_SITE","/eCommerce/");

//--- SESSION ---//
session_start();
$session_duration = 3600;
if (isset($_SESSION['last_action']) && (time() - $_SESSION['last_action']) > $session_duration) 
{ 
    session_unset();
    session_destroy();
    exit();
} else {
    $_SESSION['last_action'] = time(); // Met à jour le dernier horodatage de l'action de l'utilisateur
}
//--- FONCTIONS ---//
//----------La fonction executeQuery() exécute une requête SQL et retourne son résultat. Si la requête échoue, un message d'erreur sera affiché avec le code SQL en cause. 
function executeQuery($req)
{
    global $mysqli;
    $résultat = $mysqli->query($req); 
    if(!$résultat)
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req); 
    }
    return $résultat;
}
//----------La fonction coAdmin() vérifie si l'utilisateur est connecté en tant qu'administrateur et retourne un booléen en conséquence.
function coAdmin()
{
    if(!isset($_SESSION['admin'])) return false;
    else return true; 
}
//----------La fonction creationBasket() crée un panier pour l'utilisateur s'il n'en a pas déjà un enregistré dans sa session.
function creationBasket()
{
    if(!isset($_SESSION['basket']))
    {
        $_SESSION['basket'] = array(); 
        $_SESSION['basket']['name'] = array(); 
        $_SESSION['basket']['idProduct'] = array(); 
        $_SESSION['basket']['stock'] = array(); 
        $_SESSION['basket']['price'] = array();
    } 
}
//----------La fonction addProductBasket() ajoute un produit au panier de l'utilisateur en prenant en compte les quantités déjà enregistrées pour ce produit.
function addProductBasket($name, $idProduct, $stock, $price)
{
    creationBasket();
    $position_product = array_search($idProduct, $_SESSION['basket']['idProduct']); 
    if($position_product !== false)
    {
        $_SESSION['basket']['stock'][$position_product] += $stock ; 
    } else {
        $_SESSION['basket']['name'][] = $name; 
        $_SESSION['basket']['idProduct'][] = $idProduct; 
        $_SESSION['basket']['stock'][] = $stock; 
        $_SESSION['basket']['price'][] = $price;
    }
}
//----------La fonction updateProductQuantity() met à jour la quantité d'un produit dans le panier de l'utilisateur en fonction de son identifiant de produit, si il n'en reste qu'un il ce supprime.
function updateProductQuantity($idProduct, $quantity) 
{
    if(isset($_SESSION['basket'])) 
    {
        $position_product = array_search($idProduct, $_SESSION['basket']['idProduct']); 
        if($position_product !== false) 
        {
            $_SESSION['basket']['stock'][$position_product] += $quantity; 
            if($_SESSION['basket']['stock'][$position_product] <= 0) 
            {
                unset($_SESSION['basket']['name'][$position_product]);
                unset($_SESSION['basket']['idProduct'][$position_product]);
                unset($_SESSION['basket']['stock'][$position_product]);
                unset($_SESSION['basket']['price'][$position_product]);
            }
        }
    }
}
//----------La fonction removeProductBasket() supprime un produit du panier de l'utilisateur en fonction de son identifiant de produit.
function removeProductBasket($idProduct_delete)
{
    $position_product = array_search($idProduct_delete, $_SESSION['basket']['idProduct']); 
    if ($position_product !== false)
    {
        array_splice($_SESSION['basket']['name'], $position_product, 1); 
        array_splice($_SESSION['basket']['idProduct'], $position_product, 1); 
        array_splice($_SESSION['basket']['stock'], $position_product, 1); 
        array_splice($_SESSION['basket']['price'], $position_product, 1);
    } 
}
//----------La fonction productsAmount() calcule le montant total des produits dans le panier de l'utilisateur.
function productsAmount()
{
    $total=0;
    for($i = 0; $i < count($_SESSION['basket']['idProduct']); $i++) 
    {
        $total += $_SESSION['basket']['stock'][$i] * $_SESSION['basket']['price'][$i]; 
    }
    return round($total,2); 
}
//----------La fonction verifyAccessPayment() vérifie si l'utilisateur peut accéder à la page de paiement en fonction du contenu de son panier.
function verifyAccessPayment() 
{
    if (!isset($_SESSION['basket']) || count($_SESSION['basket']['idProduct']) == 0) 
    { 
        header('Location: home.php');
        exit();
    } else { 
        return true; 
    }
}
//--- VARIABLES ---//
//----------Variable initialisée à vide pour éviter d'avoir des erreurs undefined si jamais nous tentons de l'afficher.
$content = '';
$content_footer = '';
//----------Affichage du logo pour mes différents fichiers.
$result_footer = executeQuery("SELECT * FROM `editFooter`");
$line_footer = $result_footer->fetch_assoc();
?>
