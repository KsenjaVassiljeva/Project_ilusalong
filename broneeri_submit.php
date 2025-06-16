<?php
require_once 'db.php';

$nimi = htmlspecialchars(trim($_POST['nimi']));
$email = htmlspecialchars(trim($_POST['email']));
$teenus_id = (int) $_POST['teenus_id'];
$tootaja_id = !empty($_POST['tootaja_id']) ? (int) $_POST['tootaja_id'] : null;
$kuupaev = $_POST['kuupäev'];

$sql = "INSERT INTO broneeringud (nimi, email, teenus_id, töötaja_id, kuupäev) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$success = $stmt->execute([
    $nimi,
    $email,
    $teenus_id,
    $tootaja_id,
    $kuupaev
]);
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8" />
  <title>Broneering kinnitatud</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="confirmation-box">
    <?php if ($success): ?>
      <h1>✅ Edu!</h1>
      <p>Täname, <strong><?= htmlspecialchars($nimi) ?></strong>, broneering on edukalt salvestatud.</p>
      <p>Kuupäev: <strong><?= htmlspecialchars($kuupaev) ?></strong></p>
      <p>Me saadame kinnitusmeili aadressile: <strong><?= htmlspecialchars($email) ?></strong></p>
      <a href="index.html" class="btn">Tagasi avalehele</a>
    <?php else: ?>
      <h1>❌ Viga</h1>
      <p>Vabandust, broneeringu salvestamisel tekkis probleem.</p>
      <a href="index.html" class="btn">Proovi uuesti</a>
    <?php endif; ?>
  </div>
</body>
</html>
