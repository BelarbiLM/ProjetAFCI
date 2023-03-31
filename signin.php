<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>

<body class="text-center signin d-flex align-items-center">
  <main class="form-signin w-100 m-auto">
    <form method="post" id="form-signin" class="mt-5"> 
      <img src="inc/img/logo.png" alt="Logo" class="logo mb-5">

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="id" placeholder="Identifiant" required>
        <label for="id">Identifiant</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="mdp" placeholder="Password" required>
        <label for="mdp">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
  </main> 
</body>
</html>