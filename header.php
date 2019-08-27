<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sira projet de ouf de la mort ki tue</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <link rel="stylesheet" href="/sira/utilities/polices/font/css/all.min.css" style="text/css">
    <link rel="stylesheet" href="/sira/utilities/css/style.css" style="text/css">
</head>
<body>


<header>
    <p><img id="voiture" src="/sira/utilities/img/background1.jpg" alt="tuture"></p>
    <h1 id="titre1">Bienvenue chez Sira<br>Location de véhicule 24h/24 7j/7</h1>

    <div id="accueil">

    <button onclick= document.location.href="/sira/inscription.php">Inscription</button>
    <button onclick= document.location.href="/sira/connexion.php">Connexion</button>
    </div>
    <?php 

if (isset($_SESSION['membre'])) {
    if ($_SESSION['membre']['statut'] == 'particulier' || $_SESSION['membre']['statut'] == 'professionnel' && $_SESSION['membre']['role'] !='admin') {
        echo '<style>
#accueil button{
    visibility:hidden;
};
    </style>';
        echo '<nav class="navbar container">
<a href="../index.php" class=" btn btn-success">Accueil</a>
<button class=" btn btn-primary">Mon compte</button>
<button onclick= document.location.href="/sira/client/commander.php" class=" btn btn-dark">Commande</button>
<button class=" btn btn-warning" onclick= document.location.href="deconnexion.php">Déconnexion</button>
</nav>';
        
    } elseif ($_SESSION['membre']['statut'] == 'particulier' || $_SESSION['membre']['statut'] == 'professionnel' && $_SESSION['membre']['role'] =='admin') {
        echo '<style>
  #accueil button{
      visibility:hidden;
  };
      </style>';
        echo '<nav class="navbar container">
  <button class=" btn btn-dark" onclick= document.location.href="/sira/admin/gestion_agences.php">Agences</button>
  <button class=" btn btn-dark" onclick= document.location.href="/sira/admin/gestion_vehicules.php">Véhicules</button>
  <button class=" btn btn-dark" onclick= document.location.href="/sira/admin/gestion_membres.php">Membres</button>
  <button class=" btn btn-dark" onclick= document.location.href="/sira/admin/gestion_commandes.php">Commandes</button>
  <button onclick= document.location.href="/sira/deconnexion.php" class=" btn btn-danger">Logout</button>
  </nav>';
        
    }
}

?>

</header>