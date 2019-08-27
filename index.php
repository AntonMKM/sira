<?php
include 'header.php';

$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");

$recup = $pdo -> query("SELECT * FROM vehicule");
echo '<div class="row">';
while ($donnees = $recup->fetch()) {
   echo '<div class="card" style="background-color:rgb(156, 156, 156, 0.5); width: 18rem; color:black; margin-top: 15vw; margin-left: 20px; margin-right: 20px;">
   <img src="utilities/img/' . $donnees['photo'] . '" class="card-img-top" alt="...">
   <div class="card-body">
     <h5 class="card-title">' . $donnees['titre'] . '</h5>
     <p class="card-text">' . $donnees['description'] .'</p>
     <a href="client/commander.php?id_vehicule=' . $donnees['id_vehicule'].'" class="btn btn-warning">Louer pour : ' . $donnees['prix_journalier'] . ' € / jour</a>
     </a>
   </div>
 </div>';
 
};
echo '</div>';
?>
