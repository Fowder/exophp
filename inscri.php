<?php

include 'bdd.php';
if(isset($_POST['submit'])) {
	if(isset($_POST['pseudo'],$_POST['password'],$_POST['password2'])) {
		if(!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$password = htmlspecialchars($_POST['password']);
			$password2 = htmlspecialchars($_POST['password2']);
									$passwordhash = hash ('sha256', $password);
									$verify_user = $bdd->prepare('SELECT count(*) FROM membre WHERE pseudo= ?');
$sql = $bdd->prepare('INSERT INTO membre(pseudo, password) VALUES(:pseudo, :password)');
$verify = $bdd->prepare('SELECT count(*) FROM membre WHERE pseudo= ? AND password= ?');
$verify_user->execute(array($pseudo));
$result = $verify_user->fetch();
if ($result[0] == 0){
	$verify_user->closeCursor();
	$sql->execute(array(':pseudo' => $pseudo, ':password' => $passwordhash));
	$sql->closeCursor();
	$verify->execute(array($pseudo, $passwordhash));
	
	$data = $verify->fetch();
	
	if ($data[0] == 1) {
		session_start();
		$_SESSION['pseudo'] = $pseudo;
		
	header('location:evenement.php'); }
	else{header('location:echec.php');
	
}}}}
}
?>