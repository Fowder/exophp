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
echo '<form method="post" action="creationblog.php">';
echo '<div class="form-group">
<input name="image" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Image">
</div>';
echo '<div class="form-group">
<input name="sujet" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Sujet">
</div>';
echo '<div class="form-group">
<input name="message" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Message">
</div>';
echo '<div class="form-group">
<input name="intro" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Intro">
</div>';
echo '<input class="btn btn-success" type="submit" value="Créer"></form>';
echo '</div></div>';

if(!empty($_POST['image']) AND !empty($_POST['sujet']) AND !empty($_POST['message']) AND !empty($_POST['intro'])){

    $sql = $bdd->prepare('INSERT INTO blog (img, sujet, message, intro, auteur) VALUES (:img, :sujet, :message, :intro, :auteur)');
    $sql->execute(array(':img' => $_POST['image'], ':sujet' => $_POST['sujet'], ':message' => $_POST['message'], ':intro' => $_POST['intro'], ':auteur' => $_SESSION['pseudo']));
	$sql->closeCursor();

header('location:blog.php');

}

?>
    
    <script src="js/app.js"></script>
</body>
</html>