
<?php
include '../header.php';

// INSERTION AGENCE *** verifier nom de la table ***

if (isset($_POST['titre']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['description']) && isset($_FILES['photo'])) {

    $pdo = new PDO('mysql:host=localhost;dbname=sira;charset=utf8', 'root', '');
    $ajoutAgence = $pdo->prepare("INSERT INTO agences(titre, adresse, ville, cp, description, photo) 
                                  VALUES (:titre, :adresse, :ville, :cp, :description, :photo)");
    $ajoutAgence->execute(array(
        'titre' => $_POST['titre'],
        'adresse' => $_POST['adresse'],
        'ville' => $_POST['ville'],
        'cp' => $_POST['cp'],
        'description' => $_POST['description'],
        'photo' => $_FILES['photo']['name']
    ));

if(isset($_FILES['photo'])) {
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
// Afficher les agences.

$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");

$recup = $pdo -> query("SELECT * FROM agences");

?>

<table id="table1">


<tr>
    <th>Titre</th>
    <th>Adresse</th>
    <th>Ville</th>
    <th>Code postal</th>
    <th>Description</th>
    <th>Photo</th>
  </tr>

  <?php 

   while ($donnees = $recup->fetch()) {
       echo '<tr>';

       echo '<td>' . $donnees['titre'] . '</td>';
       echo '<td>' . $donnees['adresse'] . '</td>';
       echo '<td>' . $donnees['ville'] . '</td>';
       echo '<td>' . $donnees['cp'] . '</td>';
       echo '<td>' . $donnees['description'] . '</td>';
       echo '<td><img id="photoAgences" src="img/' . $donnees['photo'] . '"></img></td>';

       echo '</tr>';
   };
   ?>

</table>

    <!-- AJOUTER UNE AGENCE-->
    
    <form class="form-signin formAgence" action="#" method="POST" enctype="multipart/form-data">
        <h2 class="h3 mb-3 font-weight-normal">Ajouter une agence</h2>
        <input class="form-control troll" type="text" name="titre" placeholder="Titre">
        <input class="form-control troll" type="text" name="adresse" placeholder="Adresse">
        <input class="form-control troll" type="text" name="ville" placeholder="Ville">
        <input class="form-control troll" type="text" name="cp" placeholder="Code postal">
        <input class="form-control troll" type="text" name="description" placeholder="Description">
        <input id="avatar" class="form-control troll" type="file" name="photo">
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="envoi1">
    </form>
    <br>