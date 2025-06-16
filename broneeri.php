<?php
require_once 'db.php';

// Запрашиваем все услуги
$stmt = $pdo->query("SELECT id, nimi, hind FROM teenused");
$teenused = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Запрашиваем всех работников
$stmt2 = $pdo->query("SELECT id, nimi FROM töötajad");
$tootajad = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="et">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Julia - IluSalong</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1><a href="index.html">Julia</a></h1>
    <p>Project Ilusalong</p>
    <nav>
      <ul>
        <li><a href="teenused.html">Teenused</a></li>
        <li><a href="tootajad.html">Töötajad</a></li>
        <li><a href="püsikliendile.html">Püsikliendile</a></li>
        <li><a href="salongist.html">Salongist</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="broneeri_submit.php" method="POST" class="booking-form">
      <label for="nimi">Sinu nimi:</label>
      <input type="text" name="nimi" required>

      <label for="email">E-post:</label>
      <input type="email" name="email" required>

      <label for="teenus_id">Vali teenus:</label>
      <select name="teenus_id" required>
        <?php foreach ($teenused as $teenus): ?>
          <option value="<?= $teenus['id'] ?>">
            <?= htmlspecialchars($teenus['nimi']) ?> – <?= number_format($teenus['hind'], 2, ',', ' ') ?> €
          </option>
        <?php endforeach; ?>
      </select>

      <label for="töötaja_id">Vali töötaja (kui soovid):</label>
      <select name="töötaja_id">
        <option value="">– Ei vali –</option>
        <?php foreach ($tootajad as $tootaja): ?>
          <option value="<?= $tootaja['id'] ?>">
            <?= htmlspecialchars($tootaja['nimi']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label for="kuupäev">Kuupäev:</label>
      <input type="date" name="kuupäev" required>

      <button type="submit">Broneeri</button>
    </form>
  </main>
</body>
</html>
