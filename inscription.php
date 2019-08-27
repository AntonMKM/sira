<?php require 'header.php';?>

<?php
$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");
$query = $pdo->prepare("INSERT INTO membre(nom, prenom, email,tel, pseudo, mdp, civilite, statut, photo) VALUES(:nom, :prenom, :email, :tel, :pseudo, :mdp, :civilite, :statut, :photo)");

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['enregistrer'])) {
    $query->execute(array('nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp'],
        'civilite' => $_POST['civilite'],
        'statut' => $_POST['statut'],
        'photo' => $_FILES['photo']['name']
    ));
    header('location: connexion.php');
}
// Envoi photo

if (isset($_POST['photo'])) {
    if ($_FILES['photo']['size'] <= 1000000) {
        //extensiosn autorisées
        $extension_autorisees = ["jpg", "jpeg", "png", "gif"];
        //nom et extension
        $info = pathinfo($_FILES['photo']['name']);
        //extension de notre photo
        $extension_uploadee = $info['extension'];
        //on va vérifier l'exentsion
        if (in_array($extension_uploadee, $extension_autorisees)) {
            $nom = $_FILES['photo']['name'];
            $finish = move_uploaded_file($_FILES['photo']['tmp_name'], $nom);
            global $finish;
            echo 'photo transféré avec succès';
        }
    } else {
        echo "taille trop importante";
    }
}
?>

<style>
#accueil button {
    visibility:hidden;
}
    </style>

<form class="form-signin" method="post" action=""  enctype="multipart/form-data">
  <h2 class="h3 mb-3 font-weight-normal">-Inscription !-</h2>
  <input name="pseudo" type="text" id="inputPseudo" class="form-control troll" placeholder="Pseudo" required>
  <input name="mdp" type="password" id="inputPassword" class="form-control troll" placeholder="Mot de passe" required>
  <input name="nom" type="text" id="inputNom" class="form-control troll" placeholder="Nom" required>
  <input name="prenom" type="text" id="inputPrenom" class="form-control troll" placeholder="Prénom" required>
  <input name="email" type="email" id="inputEmail" class="form-control troll" placeholder="Adresse mail" required>
  <input name="tel"type="text" id="inputTel" class="form-control troll" placeholder="Téléphone" required>
  <br>
  <label class="gras">Quel est votre sexe ?</label>
  <br>
  <label for="inputHomme">Homme</label>
  <input value="homme" name="civilite" type="radio" id="inputHomme" class="troll" required>

  <label for="inputFemme">Femme</label>
  <input value="femme" name="civilite" type="radio" id="inputFemme" class="troll" required>
  <br>
  <br>
  <label class="gras">Quel est votre statut ?</label>
  <br>
  <label for="inputParticulier">Particulier</label>
  <input value="particulier" name="statut" type="radio" id="inputParticulier" class="troll" required>

  <label for="inputPro">Professionnel</label>
  <input value="professionnel" name="statut" type="radio" id="inputPro" class="troll" required>
  <br><br>
  <label class="gras">Choisissez votre avatar</label>
  <input name="photo" id="avatar" type="file" class="form-control troll" required>
  <input name="enregistrer" class="btn btn-lg btn-primary btn-block" type="submit" value="S'enregistrer">
  <a href="connexion.php">Déja un compte ? Connectez-vous !</a>
  <p class="mt-5 mb-3 text-muted">&copy; William et Antho</p>
</form>
