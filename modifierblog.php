<?php session_start(); 
include 'header.php';
?>
<body>
    <?php include "menu.php"; ?>
    <?php include "bdd.php"; ?>
    <h1>Modifier</h1>
    <?php 
if(!empty($_GET['id'])){
$afficher = $bdd->query('SELECT * FROM blog WHERE id="'.$_GET['id'].'"');

while ($affiche = $afficher->fetch())

{ 
echo '<div class="centrer">';
echo '<div class="card" style="width: 40rem;">';
echo '<form method="post" action="modifierblog.php?id='.$_GET['id'].'">';
echo '<div class="form-group"><label for="image">Image</label><input class="form-control" type="text" id="image" name="image" value="'.$affiche['img'].'"></div>';
echo '<div class="form-group"><label for="sujet">Sujet</label><input class="form-control" type="text" id="sujet" name="sujet" value="'.$affiche['sujet'].'"></div>';
echo '<div class="form-group"><label for="message">Message</label><input class="form-control" type="text" id="message" name="message" value="'.$affiche['message'].'"></div>';
echo '<div class="form-group"><label for="intro">Intro</label><input class="form-control" type="text" id="intro" name="intro" value="'.$affiche['intro'].'"></div>';
echo '<input class="btn btn-success" type="submit" value="Confirmer"></form>';
echo '</div></div>';
}
}

if(!empty($_POST['image']) AND !empty($_POST['sujet']) AND !empty($_POST['message']) AND !empty($_POST['intro'])){
$req = $bdd->prepare(
    'UPDATE blog
SET sujet = ?,
message = ?,
img = ?,
intro = ?,
auteur = ?
WHERE id = ?');

$req->execute(array(
    $_POST['sujet'],
    $_POST['message'],
    $_POST['image'],
    $_POST['intro'],
    $_SESSION['pseudo'],
    $_GET['id']));

$req->closeCursor();

echo 'Modification effectuée';

header('location:blog.php');

}

?>
    
    <script src="js/app.js"></script>
</body>
</html>