<?php
$title = 'Menu';

$file = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.csv');
foreach ($file as $key => $ligne) {
  $file[$key] = explode(';', trim($ligne));
}

include './elements/header.php';
?>

<h1>Menu</h1>

<?php foreach ($file as $ligne) : ?>

  <?php if (count($ligne) === 1) : ?>
    <h2><?= $ligne[0]; ?></h2>
  <?php else : ?>
    <div class="row">
      <div class="col-sm-8">
        <p>
          <strong><?= $ligne[0]; ?></strong><br />
          <?= $ligne[1]; ?>
        </p>
      </div>
      <div class="col-sm-4">
        <strong><?= number_format($ligne[2], 2, ',', ' '); ?>€</strong>
      </div>
    </div>
  <?php endif; ?>

<?php endforeach; ?>

<?php include './elements/footer.php'; ?>