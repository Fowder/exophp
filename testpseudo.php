<?php
include 'bdd.php';

$reponse = $bdd->query('SELECT * FROM membre WHERE pseudo="'.$_GET["pseudo"].'"');
$test = $reponse->fetch();

if($_GET["pseudo"] == ""){
    echo "3";
}
else if($test){
echo "1";
}
else{
echo "2";
}

$reponse->closeCursor();

?>