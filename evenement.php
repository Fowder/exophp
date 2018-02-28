<?php
session_start();
include 'sessionpage.php';
include 'header.php';
if(isset($_SESSION['pseudo'])) { ?>
<body>
    <?php include "menu.php"; ?>
    <h1>Evenement</h1>
    <p><a href="creationevenement.php"><button class="btn btn-success">Créer un événement</button></a></p>
    <?php include "bdd.php"; 

$messagesParPage=5;
$retour_total = $bdd->query('SELECT COUNT(*) AS total FROM evenement');
$donnees_total= $retour_total->fetch();
$total=$donnees_total['total'];
$nombreDePages=ceil($total/$messagesParPage);
if(isset($_GET['page']))
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages)
     {
          $pageActuelle=$nombreDePages;
     }
     if($pageActuelle<=0){
         $pageActuelle=1;
     }
}
else
{
     $pageActuelle=1; 
}

$premiereEntree=($pageActuelle-1)*$messagesParPage;
 
$afficher = $bdd->query('SELECT * FROM evenement ORDER BY creation DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');

while ($affiche = $afficher->fetch())

{ 
echo '<div class="centrer"><div class="card" style="width: 18rem;"><img class="card-img-top" src="img/'.$affiche['img'].'"><br>';
echo '<div class="card-body">Titre : '.$affiche['titre'].'<br>';
echo 'Lieu : '.$affiche['lieu'].'<br>';
echo 'Description : '.$affiche['description'].'<br>';
echo 'Creation : '.$affiche['creation'].'<br>';
echo 'Date : '.$affiche['date'].'<br>';
if(($_SESSION['pseudo'] == $affiche['auteur']) OR ($_SESSION['admin'] == 1)){
    echo '<form method="get" action="modifier.php">
    <button class="btn btn-primary" name="id" type="submit" value="'.$affiche['id'].'">Modifier</button>
    </form></div></div></div>';   
}
}

echo '<p align="center">Page : ';
for($i=1; $i<=$nombreDePages; $i++)
{

     if($i==$pageActuelle)
     {
         echo '<button class="current">'.$i.'</button>'; 
     }	
     else
     {
          echo ' <a href="evenement.php?page='.$i.'"><button class="pascurrent">'.$i.'</button></a> ';
     }
}
echo '</p>';
    
    ?>

    <script src="js/app.js"></script>
</body>
</html>

<?php } else {
    header('location:login.php');} ?>