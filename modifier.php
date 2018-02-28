<?php session_start(); 
include 'header.php';
?>
<body>
    <?php include "menu.php"; ?>
    <?php include "bdd.php"; ?>
    <h1>Modifier</h1>
    <?php 
if(!empty($_GET['id'])){
$afficher = $bdd->query('SELECT * FROM evenement WHERE id="'.$_GET['id'].'"');

while ($affiche = $afficher->fetch())

{ 
echo '<div class="centrer">';
echo '<div class="card" style="width: 40rem;">';
echo '<form method="post" action="modifier.php?id='.$_GET['id'].'">';
echo '<div class="form-group"><label for="image">Image</label><input class="form-control" type="text" id="image" name="image" value="'.$affiche['img'].'"></div>';
echo '<div class="form-group"><label for="titre">Titre</label><input class="form-control" type="text" id="titre" name="titre" value="'.$affiche['titre'].'"></div>';
echo '<div class="form-group"><label for="lieu">Lieu</label><input class="form-control" type="text" id="lieu" name="lieu" value="'.$affiche['lieu'].'"></div>';
echo '<div class="form-group"><label for="description">Description</label><input class="form-control" type="text" id="description" name="description" value="'.$affiche['description'].'"></div>';
echo '<div class="form-group"><label for="date">Date</label><input class="form-control" type="text" id="date" name="date" value="'.$affiche['date'].'"></div>';
echo '<input class="btn btn-success" type="submit" value="Confirmer"></form>';
echo '</div></div>';
}
}

if(!empty($_POST['titre']) AND !empty($_POST['image']) AND !empty($_POST['lieu']) AND !empty($_POST['description']) AND !empty($_POST['date'])){
$req = $bdd->prepare(
    'UPDATE evenement
SET titre = ?,
img = ?,
lieu = ?,
description = ?,
date = ?
WHERE id = ?');

$req->execute(array(
    $_POST['titre'],
    $_POST['image'],
    $_POST['lieu'],
    $_POST['description'],
    $_POST['date'],
    $_GET['id']));

$req->closeCursor();

echo 'Modification effectuée';

header('location:evenement.php');

}

?>
    
    <script src="js/app.js"></script>
</body>
</html>