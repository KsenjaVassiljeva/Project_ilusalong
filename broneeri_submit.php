<?php
require_once 'db.php';

$nimi = htmlspecialchars(trim($_POST['nimi']));
$email = htmlspecialchars(trim($_POST['email']));
$teenus_id = (int) $_POST['teenus_id'];
$tootaja_id = !empty($_POST['tootaja_id']) ? (int) $_POST['tootaja_id'] : null;

$kuupaev = $_POST['kuupäev'];

$sql = "INSERT INTO broneeringud (nimi, email, teenus_id, töötaja_id, kuupäev) VALUES (?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);


$stmt->execute([
    $nimi,
    $email,
    $teenus_id,
    $tootaja_id,
    $kuupaev
]);

echo "✅ Broneering edukalt salvestatud!";
?>
