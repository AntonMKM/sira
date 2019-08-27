<?php
if (isset($_GET['id_membre'])) {
    $id_membre = $_GET['id_membre'];
    $pdo = new PDO('mysql:host=localhost;dbname=sira', 'root', '');
    $supprimer = $pdo->prepare("DELETE FROM membre WHERE id_membre = $id_membre");
    $supprimer->execute();
}
?>

<script>
document.location.href="/sira/admin/gestion_membres.php";
    </script>