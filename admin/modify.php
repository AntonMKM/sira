<?php 
include('../header.php');

?>
<script>
</script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification</title>
</head>
<body>

<?php 

if (isset($_GET['id_membre'])) {
    $id_membre = $_GET['id_membre'];
    $pdo = new PDO('mysql:host=localhost;dbname=sira', 'root', '');
    $insertion = $pdo->prepare("SELECT * FROM membre WHERE id_membre = $id_membre");
    $insertion->execute();
    
    while ($donnees = $insertion->fetch()){
echo '<form method="post" action="">';
echo ' <div class="row">
<div class="col">
    <label>Pseudo</label>
    <input value="' . $donnees['pseudo'] . '" type="text" class="form-control" name="pseudo">
</div>

<div class="col">
    <label>Pass</label>
    <input value="' . $donnees['mdp'] . '" type="text" class="form-control" name="mdp">
</div>

<div class="col">
    <label>Nom</label>
    <input value="' . $donnees['nom'] . '" type="text" class="form-control" name="nom">
</div>

<div class="col">
    <label>Prenom</label>
    <input value="' . $donnees['prenom'] . '" type="text" class="form-control" name="prenom">
</div>

<div class="col">
    <label>Email</label>
    <input value="' . $donnees['email'] . '" type="text" class="form-control" name="email">
</div>
</div>

<div class="row">
<div class="col">
    <label>Civilite</label>
    <input value="' . $donnees['civilite'] . '" type="text" class="form-control" name="civilite">
</div>

<div class="col">
    <label>Statut</label>
    <input value="' . $donnees['statut'] . '" type="text" class="form-control" name="statut">
</div>

<div class="col">
    <label>Role</label>
    <input value="' . $donnees['role'] . '" type="text" class="form-control" name="role">
</div>

<div class="col">
    <label>Date</label>
    <input value="' . $donnees['date_enregistrement'] . '" type="text" class="form-control" name="date_enregistrement">
</div>

<div class="col">
    <label>Tel</label>
    <input value="' . $donnees['tel'] . '" type="text" class="form-control" name="tel">
</div>

<div class="col">
    <label>Photo</label>
    <input value="' . $donnees['photo'] . '" type="text" class="form-control" name="photo">
</div>
</div>
<input value="Envoi" type="submit">
';
echo '</form>';
       
    }
}
if (isset($_POST['photo']) && isset($_POST['tel']) && isset($_POST['date_enregistrement']) && isset($_POST['role']) && isset($_POST['statut']) && isset($_POST['civilite']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mdp']) && isset($_POST['pseudo'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=sira', 'root', '');
    $modifier = $pdo->prepare('UPDATE membre SET photo = :photo, tel=:tel, date_enregistrement = :date_enregistrement, role = :role, statut = :statut, civilite = :civilite, email = :email, prenom = :prenom, nom = :nom, mdp = :mdp, pseudo = :pseudo WHERE id_membre = ' . $id_membre . '');
    $modifier->execute(array('photo' => $_POST['photo'],
                            'tel' => $_POST['tel'],
                            'date_enregistrement' => $_POST['date_enregistrement'],
                            'role' => $_POST['role'],
                            'statut' => $_POST['statut'],
                            'civilite' => $_POST['civilite'],
                            'email' => $_POST['email'],
                            'prenom' => $_POST['prenom'],
                            'nom' => $_POST['nom'],
                            'mdp' => $_POST['mdp'],
                            'pseudo' => $_POST['pseudo'],
));
}
?>
    
    <script type="text/javascript" src="../redirection.js"></script>

</body>
</html>