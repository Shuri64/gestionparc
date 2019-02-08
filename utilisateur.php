<a href="liste_utilisateur.php">Retour à la liste des utilisateurs</a>
<?php

//connexion à la base de donnee par une variable
    $pdo = new PDO ("mysql:host=localhost;dbname=gestionparc","root","");

//requête à exécuter
    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur=?";

//exécution de la requête (appel de la méthode query sur l'objet $pdo)
    $stmt = $pdo->prepare($sql);//préparation de la requête
    $stmt->execute([$_GET['id']]);//exécution de la requête

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);//$utilisateur dont l'id_utilisateur correspond à la valeur de $_GET['id']

    var_dump($utilisateur);
?>
<h2><?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?></h2>