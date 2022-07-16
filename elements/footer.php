<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php';
?>

</main>

<footer>
  <hr />

  <div class="row">
    <div class="col-md-4">
      <?php
      require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
      add_compteur();
      $vues = read_compteur();
      $vuesDaily = read_compteur_daily();
      ?>
      Il y a <?= $vues; ?> visite<?= $vues > 1 ? 's' : ''; ?> sur le site<br />
      Il y a <?= $vuesDaily; ?> visite<?= $vuesDaily > 1 ? 's' : ''; ?> sur le site aujourd'hui
    </div>

    <div class="col-md-4">
      <form action="../newsletter.php" method="POST" class="form-inline">
        <div class="form-group mb-2">
          <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre email" required />
        </div>

        <button class="btn btn-primary" type="submit">S'inscrire</button>
      </form>
    </div>

    <div class="col-md-4">
      <h5>Navigation</h5>
      <ul class="list-unstyled text-small">
        <?= nav_menu(); ?>
      </ul>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>