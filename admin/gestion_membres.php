<?php
include('../header.php');
$pdo = new PDO("mysql:host=localhost; dbname=sira; charset=UTF8", "root", "");
// AFFICHAGE DES MEMBRES
$reponse = $pdo->query('SELECT * FROM membre');
echo '<table id="table2" class="table">';
echo '<thead class="thead-dark">';
echo '<th scope="col">Pseudo</th>';
echo '<th scope="col">Nom</th>';
echo '<th scope="col">Prénom</th>';
echo '<th scope="col">Email</th>';
echo '<th scope="col">Civilité</th>';
echo '<th scope="col">Statut</th>';
echo '<th scope="col">Rôle</th>';
echo '<th scope="col">Date inscription</th>';
echo '<th scope="col">Action</th>';
while ($donnees = $reponse->fetch()) {
    $id = $donnees['id_membre'];
    $id2 = $donnees['id_membre'];
    echo '<tr>';
    echo '<td> ' . $donnees['pseudo'] . '</td> ';
    echo '<td> ' . $donnees['nom'] . '</td> ';
    echo '<td> ' . $donnees['prenom'] . '</td> ';
    echo '<td> ' . $donnees['email'] . '</td> ';
    echo '<td> ' . $donnees['civilite'] . '</td> ';
    echo '<td> ' . $donnees['statut'] . '</td> ';
    echo '<td> ' . $donnees['role'] . '</td> ';
    echo '<td> ' . $donnees['date_enregistrement'] . '</td> ';
    echo '<td>
    <a type="button" id="suppr2" href="modify.php?id_membre=' . $id2 . '"><i class="fas fa-user-edit"></i>
    </a>

    <a type="button" id="suppr2" href="../fonctions.php?id_membre=' . $id . '"><i class="fas fa-trash-alt"></i></a>

    </td>';
    echo '<br>';
    echo '</tr>';
};
echo '</table>';
echo '<br>';
echo '<br>';

// AJOUTER UN MEMBRE
$query = $pdo->prepare("INSERT INTO membre(nom, prenom, email,tel, pseudo, mdp, role, civilite, statut, photo) VALUES(:nom, :prenom, :email, :tel, :pseudo, :mdp, :role, :civilite, :statut, :photo)");

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $query->execute(array('nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp'],
        'role' => $_POST['role'],
        'civilite' => $_POST['civilite'],
        'statut' => $_POST['statut'],
        'photo' => 'default.jpg'
    ));
    echo '<script>
    document.location.href="/sira/admin/gestion_membres.php";
    </script>';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    
    <meta charset="UTF-8">
   
    <title>Gestion des membres</title>
</head>

<body>

    <!-- AJOUT DE MEMBRE -->
    <h2 class="h2" style="text-align:center"> Ajouter un membre </h2><br>
    <form class="container" method="post" action="">
        <div class="row">
            <div class="col">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="col">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="mdp">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col">
                <label>Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="row">
            <div id="envoie">
                <label>Civilite</label>
                <select class="form-control" name="civilite">
                    <option selected>femme</option>
                    <option>homme</option>
                </select>
            </div>
            <div id="envoie">
                <label>Role</label>
                <select class="form-control" name="role">
                    <option selected>client</option>
                    <option>admin</option>
                </select>
            </div>
            <div id="envoie">
                <label>Statut</label>
                <select class="form-control" name="statut">
                    <option selected>professionnel</option>
                    <option>particulier</option>
                </select>
            </div>
        </div>
        <div class="col">
                <label>Téléphone</label>
                <input type="text" class="form-control" name="tel">
            
            <br>
        <input id="envoie" type="submit" class="btn btn-success">
        </div>
    </form>

</body>

</html>