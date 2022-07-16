<?php
$error = null;
$success = null;
$email = $_POST['email'] ?? null;

if (!empty($email)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $pathFile = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
    $result = file_put_contents($pathFile, $email . PHP_EOL, FILE_APPEND);
    if (!$result) {
      $error = 'Une erreur est survenue';
    } else {
      $success = 'Votre mail a bien été enregistré';
      $email = null;
    }
  } else {
    $error = 'Email invalide';
  }
}

$title = 'Newsletter';
include './elements/header.php';
?>

<h1>S'inscrire à la newsletter</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt quibusdam, cum dicta praesentium dolorem corrupti blanditiis consequatur, sequi ullam officiis assumenda hic delectus magni. Natus deserunt ipsam quam dignissimos impedit.</p>

<?php if ($success) : ?>
  <div class="alert alert-success">
    <?= $success; ?>
  </div>
<?php endif; ?>

<?php if ($error) : ?>
  <div class="alert alert-danger">
    <?= $error; ?>
  </div>
<?php endif; ?>

<form method="POST" class="form-inline">
  <div class="form-group mb-3">
    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre email" value="<?= htmlentities($email); ?>" required />
  </div>

  <button class="btn btn-primary" type="submit">S'inscrire</button>
</form>

<?php include './elements/footer.php'; ?>