<?php  include '../header.php';
?>
    
        <h2 class="h3 mb-3 font-weight-normal">Commander une voiture</h2>
<?php
        if (isset($_GET['id_vehicule'])) {
            
            $id_vehicule = $_GET['id_vehicule'];
            $pdo = new PDO('mysql:host=localhost;dbname=sira; charset=utf8', 'root', '');
            $insertion = $pdo->prepare("SELECT * FROM vehicule WHERE id_vehicule = $id_vehicule");
            $insertion->execute();
    
            while ($donnees = $insertion->fetch()) {
                echo '<form method="post" action="">';
                echo ' <div class="row container">
<div class="col">
    <label>ID véhicule</label>
    <input value="' . $donnees['id_vehicule'] . '" type="text" class="form-control" name="id_vehicule">
</div>

<div class="col">
    <label>Agence</label>
    <input value="' . $donnees['id_agence'] . '" type="text" class="form-control" name="id_agence">
</div>

<div class="col">
    <label>Titre</label>
    <input value="' . $donnees['titre'] . '" type="text" class="form-control" name="titre">
</div>

<div class="col">
    <label>Marque</label>
    <input value="' . $donnees['marque'] . '" type="text" class="form-control" name="marque">
</div>

<div class="col">
    <label>Modèle</label>
    <input value="' . $donnees['modele'] . '" type="text" class="form-control" name="modele">
</div>
<div>
<label>Prix journalier</label>
    <input value="' . $donnees['prix_journalier'] . '" type="text" class="form-control" name="prix_journalier">
    </div>
    <div>
<label>Date début</label>
    <input  type="date" class="form-control" name="date_heure_depart">
    </div>
    <div>
<label>Date fin"</label>
    <input  type="date" class="form-control" name="date_heure_fin">
    </div>
</div>
    
<input value="Envoi" type="submit">
';
                echo '</form>';
            }
        }
?>
</body>
</html>