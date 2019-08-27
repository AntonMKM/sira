<?php
include '../header.php';
if (isset($_POST['titre']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['description']) && isset($_POST['prix_journalier']) && isset($_FILES['photo']) && ($_POST['id_agence'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=sira;charset=utf8', 'root', '');
    $ajoutVoiture = $pdo->prepare("INSERT INTO vehicule(titre, marque, modele, description, id_agence, photo, prix_journalier)
                                  VALUES (:titre, :marque, :modele, :description, :id_agence, :photo, :prix_journalier)");
    $ajoutVoiture->execute(array(
        'titre' => $_POST['titre'],
        'marque' => $_POST['marque'],
        'modele' => $_POST['modele'],
        'description' => $_POST['description'],
        'photo' => $_FILES['photo']['name'],
        'prix_journalier' => $_POST['prix_journalier'],
        'id_agence' => $_POST['id_agence']
    ));
    if (isset($_FILES['photo'])) {

        if ($_FILES['photo']['size'] <= 1000000 && $_FILES['photo']['size'] >= 100) {
            //extensiosn autorisées
            $extension_autorisees = ["jpg", "jpeg", "png", "gif"];
            //nom et extension
            $info = pathinfo($_FILES['photo']['name']);
            //extension de notre photo
            $extension_uploadee = $info['extension'];
            //on va vérifier l'exentsion
            if (in_array($extension_uploadee, $extension_autorisees)) {
                $nom = $_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $nom);

            }
        }
    }
}
// Afficher les voitures.
$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");
$recup = $pdo->query("SELECT * FROM vehicule");
?>
<table id="table1">
    <tr>
    <th>Titre</th>
    <th>Marque</th>
    <th>Modele</th>
    <th>Description</th>
    <th>Photo</th>
    <th>Prix journalier</th>
    <th>Agences</th>
    </tr>
<?php

$afficheVagence = 'SELECT veh.*, agences.titre as titreagence FROM `vehicule` as veh INNER JOIN agences ON veh.id_agence=agences.id_agence';

$recup2 = $pdo->query($afficheVagence);

while ($donnees = $recup2->fetch()) {
    echo '<tr>';
    echo '<td>' . $donnees['titre'] . '</td>';
    echo '<td>' . $donnees['marque'] . '</td>';
    echo '<td>' . $donnees['modele'] . '</td>';
    echo '<td>' . $donnees['description'] . '</td>';
    echo '<td><img id="photoAgences" src="../utilities/img/' . $donnees['photo'] . '"></img></td>';
    echo '<td>' . $donnees['prix_journalier'] . '€</td>';
    echo '<td>' . $donnees['titreagence'] . '</td>';
    echo '</tr>';
}
;
$agences = $pdo->query('SELECT titre FROM agences');
while ($_SESSION['agencesTitre'] = $agences->fetch()){
echo $_SESSION['agencesTitre']['titre'];
}
function listArticle2($table, $v1,$v2) {
    $pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");
    $queryy = $pdo -> prepare("SELECT * FROM $table");
    $queryy -> execute();
    while ($donnee = $queryy -> fetch()) {
        echo '<option value="' . $donnee[$v1] . '">' . $donnee[$v2] . '</option>';
    }
}
?>
</table>
    <!-- AJOUTER UNE voiture-->
    <form class="form-signin formAgence" action="#" method="POST" enctype="multipart/form-data">
        <h2 class="h3 mb-3 font-weight-normal">Ajouter une voiture</h2>
        <input class="form-control troll" type="text" name="titre" placeholder="Titre">
        <input class="form-control troll" type="text" name="marque" placeholder="Marque">
        <input class="form-control troll" type="text" name="modele" placeholder="Modele">
        <input class="form-control troll" type="text" name="description" placeholder="Description">
        <select class="form-control troll" type="text" name="id_agence" placeholder="Agence">
        <?php listArticle2('agences', 'id_agence', 'titre'); ?>
        </select>
        
        <input class="form-control troll" type="text" name="prix_journalier" placeholder="Prix journalier">
        <input id="avatar" class="form-control troll" type="file" name="photo">
        <input class="btn btn-lg btn-primary btn-block" type="submit">
    </form>
    <br>
