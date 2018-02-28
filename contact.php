<?php session_start(); 
include 'sessionpage.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php include "menu.php"; 
    include "bdd.php";
    ini_set("display_errors",0);error_reporting(0);
    ?>
    <h1>Contact</h1>
    <?php 
    if(($_SESSION['admin'] == 1)){
        echo '<div class="center"><a href="demandecontact.php"><button class="btn btn-primary">Voir les demandes de contact</button></a></div>';
    }
    ?>
    <div>
    <?php 
    ini_set("display_errors",0);error_reporting(0);
    if($_POST['sujet'] AND $_POST['message']){ ?>
        <?php 
        if (stripos($_POST['sujet'], 'simplon') !== FALSE) {
            echo "<div class='center'>Vous ne pouvez pas entrer un mot vexant</div>";
        }else{
            echo '<div class="center card">
            <h3>Votre message : </h3>';
            if($_POST['sujet']){echo '<p>Sujet : '.$_POST['sujet'].'</p>';}else{$_POST['sujet'] = NULL;}
            if($_POST['message']){ echo '<p>Message : '.$_POST['message'].'</p> ';}else{$_POST['message'] = NULL;}
            if($_POST['select']){echo '<p>Thème : '.$_POST['select'].'</p> ';}else{$_POST['select'] = NULL;}
            if($_POST['radio']){echo '<p>Compte : '.$_POST['radio'].'</p> ';}else{$_POST['radio'] = NULL;}
            if($_POST['age']){echo '<p>Age : '.$_POST['age'].'</p> ';}else{$_POST['age'] = NULL;}
            echo '</div>';
        $sql = $bdd->prepare('INSERT INTO contact(sujet, message, theme, compte, age) VALUES (:sujet, :message, :theme, :compte, :age)');
        $sql->execute(array(':sujet' => $_POST['sujet'], ':message' => $_POST['message'], ':theme' => $_POST['select'], ':compte' => $_POST['radio'], ':age' => $_POST['age']));
        $sql->closeCursor();
        echo "<div class='center success'><h4>Message envoyé</h4></div>";
        } ?>
        <?php  } else {
            echo "<div class='center bottom'>Veuillez remplir le sujet et le message</div>";
        } ?>
    </div>
    <div class="login center">
        <form method="post" action="contact.php">
            <div class="centrer">
                <div class="card" style="width: 40rem;">
                    <div class="form-group">
                        <input type="text" name="sujet" class="form-control" aria-describedby="emailHelp" placeholder="Sujet">
                        <small id="emailHelp" class="form-text text-muted">Ce champ est obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Message" name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Ce champ est obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control"  name="select" id="exampleFormControlSelect1">
                            <option value="thematique">Thématique</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <p>Avez-vous un compte utilisateur ?</p>
                    <label><input type="radio" name="radio" value="oui">Oui</label>
                    <label><input type="radio" name="radio" value="non">Non</label><br>
                    <div class="form-group">
                        <input placeholder="Age" name="age" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Sujet">
                    </div>
                    <input class="btn btn-danger" type="reset" name="effacer" value="Effacer">
                    <input class="btn btn-success" type="submit" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
    <script src="js/app.js"></script>
</body>
</html>