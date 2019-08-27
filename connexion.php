<?php include 'header.php'; ?> 
<?php
$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");
$recup = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = ? AND mdp = ?");

if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $recup->execute(array($_POST['pseudo'], $_POST['mdp']));
    $donnees = $recup->fetch();
    header('location: index.php');
    
    var_dump($donnees);
    $_SESSION['membre'] = $donnees;
}
?>
<style>
#accueil button {
    visibility:hidden;
}
    </style>

<form class="form-signin" method="post" action="">
  <h1 class="h3 mb-3 font-weight-normal">-Connexion !-</h1>
  <input name="pseudo" type="text" id="inputPseudo" class="form-control troll" placeholder="Pseudo" required autofocus>
  <input name="mdp" type="password" id="inputPassword" class="form-control troll" placeholder="Mot de passe" required>
  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion">
  <a href="inscription.php">Pas encore de compte ? Inscrivez-vous !</a>
  <p class="mt-5 mb-3 text-muted">&copy; William et Antho</p>
</form>
