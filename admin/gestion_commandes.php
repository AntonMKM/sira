<?php include '../header.php'; 

$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");

$recup = $pdo -> query("SELECT * FROM commande");

// while ($donnees = $recup->fetch()) {
//     echo $donnees['prix_total'];
// }

$commande = $pdo -> query('SELECT agences.titre as agenceTitre, membre.nom as membreNom, membre.prenom as membrePrenom, vehicule.marque as vehiculeMarque, vehicule.modele as vehiculeModele, date_heure_depart, date_heure_fin, prix_total, date_enregistrement FROM commande INNER JOIN agences ON commande.id_agence = agences.id_agence INNER JOIN membre ON membre.id_membre = commande.id_membre INNER JOIN  vehicule ON commande.id_vehicule = vehicule.id_vehicule');
echo "<table>";
echo "<th>Agence </th>";
echo "<th>Nom</th>";
echo "<th>Prenom </th>";
echo "<th>Marque </th>";
echo "<th>Modele </th>";

while ($a = $commande->fetch()){
    echo "<tr>";
    echo "<td>" . $a['agenceTitre'] . "</td>";
    echo "<td>" . $a['membreNom'] . "</td>";
    echo "<td>" . $a['membrePrenom'] . "</td>";
    echo "<td>" . $a['vehiculeMarque'] . "</td>";
    echo "<td>" . $a['vehiculeModele'] . "</td>";
    echo "</table>";
    echo "</tr>";
}


?> 

