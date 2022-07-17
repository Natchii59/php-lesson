<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'GuestBook.php';

$path = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages';
$book = new GuestBook($path);

$errors = null;

if (!empty($_POST['username']) && !empty($_POST['message'])) {
  $message = new Message($_POST['username'], $_POST['message']);

  if ($message->isValid()) {
    $book->addMessage($message);
  } else {
    $errors = $message->getErrors();
  }
}

$title = "Livre d'or";
require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<div class="container mt-4">
  <?php if (empty($errors)) : ?>
    <div class="alert alert-success">
      Merci pour votre message
    </div>
  <?php else : ?>
    <div class="alert alert-danger">
      Formulaire invalide
    </div>
  <?php endif; ?>

  <h1>Livre d'or</h1>

  <form method="POST">
    <div class="mb-3">
      <input type="text" value="<?= htmlentities($_POST['username'] ?? '') ?>" name="username" class="form-control<?= isset($errors['username']) ? ' is-invalid' : '' ?>" placeholder="Votre nom">
      <?php if (isset($errors['username'])) : ?>
        <div class="invalid-feedback"><?= $errors['username']; ?></div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <textarea value="<?= htmlentities($_POST['message'] ?? '') ?>" name="message" class="form-control<?= isset($errors['message']) ? ' is-invalid' : '' ?>" placeholder="Votre message"></textarea>
      <?php if (isset($errors['message'])) : ?>
        <div class="invalid-feedback"><?= $errors['message']; ?></div>
      <?php endif; ?>
    </div>

    <button class="btn btn-primary">Envoyer</button>
  </form>

  <h1 class="mt-4">Vos messages :</h1>
  <?php foreach ($book->getMessages() as $msg) {
    echo $msg->toHTML();
  } ?>
</div>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>