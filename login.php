<?php
$error = null;
$password = '$2y$12$oGTGtTGLpGtd3c2CcWE7PeCaun1OBELOeC4ATwRIoB5zG616Cp4Vy';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
  if ($_POST['username'] === 'Natchi' && password_verify($_POST['password'], $password)) {
    session_start();
    $_SESSION['connected'] = 1;
    header('Location: /dashboard.php');
    exit();
  } else {
    $error = 'Identifiants incorrects';
  }
}

require_once './functions/auth.php';
if (is_connected()) {
  header('Location: /dashboard.php');
  exit();
}

$title = 'Connexion';
require_once './elements/header.php'
?>

<?php if ($error) : ?>
  <div class="alert alert-danger">
    <?= $error ?>
  </div>
<?php endif; ?>

<form method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require './elements/footer.php'; ?>