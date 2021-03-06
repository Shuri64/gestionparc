<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php include 'nav.php' ?>

<?php
//connexion à la base de donnee  par une variables
$bdd = new PDO ("mysql:host=localhost;dbname=gestionparc","root","");

//requête à exécuter
$sql = "SELECT * FROM utilisateur";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->query($sql);

//liste des utilisateurs
$liste_utilisateurs = $stmt->fetchALL(PDO::FETCH_ASSOC);

//affichage des données
//var_dump($liste_utilisateurs);

//affichage des données
foreach($liste_utilisateurs as $utilisateur)
    {
    ?>
    <!--Lien vers la page de détail de l'utilisateur-->
    <a href="utilisateur.php?id=<?= $utilisateur["id_utilisateur"] ?>">
            <?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?>
        </a>
        <br>
    <?php
    }

//destruction de l'objet de connexion (libération de la mémoire)
$bdd = null;

?>
        </body>
</html>
