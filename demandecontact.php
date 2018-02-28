<?php
session_start(); 
include 'sessionpage.php';
include 'header.php';
include "menu.php"; 
include "bdd.php";

$afficher = $bdd->query('SELECT * FROM contact');

while ($affiche = $afficher->fetch())

{ 
    echo '<div class="centrer"><div class="card" style="width: 18rem;">';
    echo '<div class="card-body">Contact N° : '.$affiche['id'].'</div>';
    echo '<div class="card-body">Sujet : '.$affiche['sujet'].'</div>';
    echo '<div class="card-body">Message : '.$affiche['message'].'</div>';
    echo '<div class="card-body">Thème : '.$affiche['theme'].'</div>';
    echo '<div class="card-body">Compte : '.$affiche['compte'].'</div>';
    echo '<div class="card-body">Age : '.$affiche['age'].'</div>';
    echo '</div></div>';
}

?>