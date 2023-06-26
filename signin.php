<?php 
include 'inc/init.inc.php';

if(isset($_GET['action']) && $_GET['action'] == "logout") {
  session_destroy();
  header("location: signin.php");
} 

if(coAdmin()) {
  header("location: dashboard.php");
}

if(!empty($_POST['pseudo']) && !empty($_POST['pswd'])) {
  $pseudo = $_POST['pseudo'];
  $pswd = $_POST['pswd'];
  $result = executeQuery("SELECT * FROM `admin` WHERE `pseudo` = '$pseudo'");
  $result = $result->fetch_assoc();
  if($result) 
  {
    $pswdHash = $result['pswd']; 
    if(password_verify($pswd, $pswdHash)) 
    {
      $_SESSION['admin'] = true;
      $_SESSION['admin']['idAdmin'] = $result['idAdmin'];
      $_SESSION['admin']['pseudoAdmin'] = $result['pseudo'];
      header("location: dashboard.php");
    } else {
      $content ="<div class='form-contact-error w-75 d-flex align-items-center justify-content-center'>Identifiants invalides</div>";
    }
  } else {
    $content ="<div class='form-contact-error w-75 d-flex align-items-center justify-content-center'>Identifiants invalides</div>";
  }
}

include 'inc/head.inc.php';
?>
<body class="text-center signin d-flex flex-column align-items-center">
  <main class="form-signin w-100 m-auto">
    <form method="POST" id="form-signin" class="mt-5"> 
      <img src="<?php echo "{$line_footer['logo']}"; ?>" class="mb-5">
      <div class="form-floating">
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Identifiant" required>
        <label for="pseudo">Identifiant</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Password" required>
        <label for="pswd">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Connexion</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
  </main> 
  <?php echo $content; ?>
</body>
</html>