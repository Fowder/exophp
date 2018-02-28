<?php
session_start();
include 'bdd.php';
if(isset($_POST['submit'])) {
if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $passwordhash = hash ('sha256', $password);
	$recovery_user = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND password = ?");
	$recovery_user->execute(array($pseudo,$passwordhash));
	if($recovery_user->rowcount() == 1) {
		$info_user = $recovery_user->fetch();
        $_SESSION['pseudo'] = $info_user['pseudo'];
		$_SESSION['admin'] = $info_user['admin'];
		$redirect = isset($_SESSION['page']) ? $_SESSION['page'] : 'index.php';
		header('location:'.$redirect);
		} else {
			header('location:echec.php');
		}
	}
}

?>