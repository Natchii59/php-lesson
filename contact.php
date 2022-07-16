<?php
require_once './data/config.php';
require_once './functions.php';

date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jourIndex = (int)($_GET['jour'] ?? date('N') - 1);
$ouvert = in_creneaux($heure, CRENEAUX[$jourIndex]);

$title = "Page de contact";
require './elements/header.php';
?>

<div class="row">
  <div class="col-md-8">
    <h2>Nous contacter</h2>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem commodi quisquam aperiam aut veritatis eos fugit modi similique possimus doloremque, quo dignissimos culpa, natus debitis! Beatae ullam saepe reiciendis officia?</p>
  </div>

  <div class="col-md-4">
    <h3>Horaires d'ouverture</h3>

    <?php if ($ouvert) : ?>
      <div class="alert alert-success">
        Le magasin est ouvert
      </div>
    <?php else : ?>
      <div class="alert alert-danger">
        Le magasin est fermé
      </div>
    <?php endif; ?>

    <form method="GET">
      <div class="form-group">
        <select name="jour" id="jour" class="form-control">
          <?php foreach (JOURS as $key => $jour) : ?>
            <?php $selected = $key === $jourIndex ? 'selected' : ''; ?>
            <option value="<?= $key ?>" <?= $selected ?>><?= $jour ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group mb-2">
        <input type="number" name="heure" class="form-group" value="<?= $heure ?>">
      </div>

      <button class="btn btn-primary mb-4" type="submit">Vérifier</button>
    </form>

    <ul>
      <?php foreach (JOURS as $key => $jour) : ?>
        <li>
          <strong><?= $jour ?></strong> :
          <?= creneaux_html(CRENEAUX[$key]); ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<?php require './elements/footer.php'; ?>