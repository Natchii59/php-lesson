<?php

if (!empty($_POST['annee'])) {
  setcookie('annee', $_POST['annee']);
  $_COOKIE['annee'] = $_POST['annee'];
}

$annee = $_COOKIE['annee'] ?? null;

$title = 'NSFW';
include './elements/header.php';
?>

<?php if ($annee) : ?>

  <?php if ((int)date('Y') - $annee >= 18) : ?>
    <div class="alert alert-success">Vous pouvez voir le contenu</div>
  <?php else : ?>
    <div class="alert alert-danger">Vous ne pouvez pas voir le contenu</div>
  <?php endif; ?>

<?php else : ?>
  <form method="POST">
    <div class="mb-3">
      <label for="annee" class="form-label">Votre année de naissance</label>
      <select name="annee" id="annee" class="form-control">
        <?php for ($i = (int)date('Y'); $i >= 1900; $i--) : ?>
          <option value="<?= $i; ?>"><?= $i; ?></option>
        <?php endfor; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Vérifier votre âge</button>
  </form>
<?php endif; ?>

<?php include './elements/footer.php'; ?>