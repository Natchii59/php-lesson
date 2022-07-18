<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'OpenWeather.php';

$weather = new OpenWeather('aa3ccae9e4d5da527031ce20defc8862');
$data = null;

if (!empty($_GET['city'])) {
  $data = $weather->getToday($_GET['city']);
}

$title = 'Meteo';
require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<div class="container mt-4">
  <h1>Choisissez la ville</h1>

  <form method="get">
    <div class="mb-3">
      <input type="text" name="city" class="form-control" placeholder="Votre ville">
    </div>

    <button class="btn btn-primary">Valider</button>
  </form>

  <?php if ($data) : ?>
    <h1 class="mt-3">La météo (<?= $_GET['city']; ?>):</h1>

    Le <?= $data['date']->format('d/m/Y'); ?>, il fait <?= $data['temp']; ?>°C, avec <?= $data['description']; ?>
  <?php endif; ?>
</div>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>