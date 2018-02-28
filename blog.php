<?php session_start(); 
include 'sessionpage.php';
include 'header.php';
?>
<body>
    <?php include "menu.php"; 
    ini_set("display_errors",0);error_reporting(0);?>
    <h1>Blog</h1>
    <?php if(isset($_SESSION['pseudo'])) { echo '<p><a href="creationblog.php"><button class="btn btn-success">Créer un blog</button></a></p>'; } ?>
    <?php include "bdd.php"; 
    $afficher = $bdd->query('SELECT * FROM blog ORDER BY date DESC');

while ($affiche = $afficher->fetch())

{ 
echo '<div class="centrer"><div class="card" style="width: 18rem;"><img class="card-img-top" src="img/'.$affiche['img'].'"><br>';
echo '<div class="card-body">Sujet : '.$affiche['sujet'].'<br>';
echo 'Intro : '.$affiche['intro'].'<br>';
echo 'Date : '.$affiche['date'].'<br>';
if(($_SESSION['pseudo'] == $affiche['auteur']) OR ($_SESSION['admin'] == 1)){
    echo '<form method="get" action="modifierblog.php">
    <button class="btn btn-primary" name="id" type="submit" value="'.$affiche['id'].'">Modifier</button>
    </form></div></div></div>';   
}
}
    ?>

    <script src="js/app.js"></script>
</body>
</html>