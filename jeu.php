<?php
$parfums = [
  'Fraise' => 4,
  'Chocolat' => 5,
  'Menthe' => 3,
];

$cornets = [
  'Pot' => 2,
  'Cornet' => 3,
];

$supplements = [
  'Pépites de chocolat' => 1,
  'Chantilly' => 0.5,
];

$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement', 'cornet'] as $name) {
  if (isset($_GET[$name])) {
    $choix = $_GET[$name];
    $liste = $name . 's';

    if (is_array($choix)) {
      foreach ($choix as $value) {
        if (isset($$liste[$value])) {
          $ingredients[] = $value;
          $total += $$liste[$value];
        }
      }
    } else {
      if (isset($$liste[$choix])) {
        $ingredients[] = $choix;
        $total += $$liste[$choix];
      }
    }
  }
}

$title = 'Composez votre glace';
require './elements/header.php';
?>

<h1 class="mb-4">Composez votre glace</h1>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Votre glace</h5>

        <ul>
          <?php foreach ($ingredients as $ingredient) : ?>
            <li><?= $ingredient ?></li>
          <?php endforeach; ?>
        </ul>

        <p>
          <strong>Prix : </strong><?= $total ?>€
        </p>
      </div>
    </div>
  </div>

  <form action="/jeu.php" method="GET" class="col-md-8">
    <div class="form-group">
      <h5>Parfums</h5>
      <?php foreach ($parfums as $gout => $prix) : ?>
        <label for="<?= $gout ?>">
          <?= checkbox('parfum', $gout, $_GET); ?>
          <?= $gout ?> - <?= $prix ?>€
        </label>
        <br />
      <?php endforeach; ?>
    </div>

    <br />

    <div class="form-group">
      <h5>Cornets</h5>
      <?php foreach ($cornets as $type => $prix) : ?>
        <label for="<?= $type ?>">
          <?= radio('cornet', $type, $_GET); ?>
          <?= $type ?> - <?= $prix ?>€
        </label>
        <br />
      <?php endforeach; ?>
    </div>

    <br />

    <div class="form-group">
      <h5>Suppléments</h5>
      <?php foreach ($supplements as $type => $prix) : ?>
        <label for="<?= $type ?>">
          <?= checkbox('supplement', $type, $_GET); ?>
          <?= $type ?> - <?= $prix ?>€
        </label>
        <br />
      <?php endforeach; ?>
    </div>

    <br />

    <button type="submit" class="btn btn-primary">Acheter</button>
  </form>
</div>

<?php require './elements/footer.php'; ?>