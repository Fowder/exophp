<?php session_start(); 
include 'header.php';
?>
<body>
    <?php include "menu.php"; ?>
    <?php include "bdd.php"; ?>
    <h1>Créer</h1>
    <?php 

echo '<div class="centrer">';
echo '<div class="card" style="width: 40rem;">';
echo '<form method="post" action="creationevenement.php">';
echo '<div class="form-group">
<input name="image" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Image">
</div>';
echo '<div class="form-group">
<input name="titre" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Titre">
</div>';
echo '<div class="form-group">
<input name="lieu" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Lieu">
</div>';
echo '<div class="form-group">
<input name="description" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Description">
</div>';
echo '<div class="form-group">
<input name="date" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Date">
</div>';
echo '<input class="btn btn-success" type="submit" value="Créer"></form>';
echo '</div></div>';

if(!empty($_POST['titre']) AND !empty($_POST['image']) AND !empty($_POST['lieu']) AND !empty($_POST['description']) AND !empty($_POST['date'])){

    $sql = $bdd->prepare('INSERT INTO evenement (img, titre, lieu, description, date, auteur) VALUES (:img, :titre, :lieu, :description, :date, :auteur)');
    $sql->execute(array(':img' => $_POST['image'], ':titre' => $_POST['titre'], ':lieu' => $_POST['lieu'], ':description' => $_POST['description'], ':date' => $_POST['date'], ':auteur' => $_SESSION['pseudo']));
	$sql->closeCursor();

header('location:evenement.php');

}

?>
    
    <script src="js/app.js"></script>
</body>
</html>