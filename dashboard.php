<?php
require_once './functions/auth.php';
force_connected_user();

require_once './functions/compteur.php';

$annee = (int)date('Y');

$anneeSelect = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$moisSelect = empty($_GET['mois']) ? null : (int)$_GET['mois'];

if ($anneeSelect) {
  if ($moisSelect) {
    $vues = read_compteur_month($anneeSelect, $moisSelect);
    $detail = read_compteur_details($anneeSelect, $moisSelect);
  } else {
    $vues = read_compteur_year($anneeSelect);
    $detail = read_compteur_details($anneeSelect);
  }
} else {
  $vues = read_compteur();
}

$mois = [
  '01' => 'Janvier',
  '02' => 'Février',
  '03' => 'Mars',
  '04' => 'Avril',
  '05' => 'Mai',
  '06' => 'Juin',
  '07' => 'Juillet',
  '08' => 'Août',
  '09' => 'Septembre',
  '10' => 'Octobre',
  '11' => 'Novembre',
  '12' => 'Décembre',
];

require_once './elements/header.php';
?>

<div class="row">
  <div class="col-md-4">
    <div class="list-group">
      <?php for ($a = $annee; $a > $annee - 5; $a--) : ?>
        <a class="list-group-item  <?= $a === $anneeSelect ? 'active' : ''; ?>" href="./dashboard.php?annee=<?= $a ?>"><?= $a ?></a>

        <?php if ($a === $anneeSelect) : ?>
          <div class="list-group">
            <?php foreach ($mois as $key_m => $m) : ?>
              <a class="list-group-item <?= (int)$key_m === $moisSelect ? 'active' : ''; ?>" href="./dashboard.php?annee=<?= $a ?>&mois=<?= $key_m ?>"><?= $m ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card mb-4">
      <div class="card-body">
        <strong style="font-size: 3em;"><?= $vues ?></strong>
        Visite<?= $vues > 1 ? 's' : '' ?> total
      </div>
    </div>

    <?php if (isset($detail)) : ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Jour</th>
            <?php if (!$moisSelect) : ?>
              <th>Mois</th>
            <?php endif; ?>
            <th>Nombre de visites</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($detail as $d) : ?>
            <tr>
              <td><?= $d['jour']; ?></td>
              <?php if (!$moisSelect) : ?>
                <td><?= $d['mois']; ?></td>
              <?php endif; ?>
              <td><?= $d['visites']; ?> visite<?= $d['visites'] > 1 ? 's' : ''; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>


<?php require './elements/footer.php' ?>