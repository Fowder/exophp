    <?php
session_start();
include 'header.php';
?>
<body>
    <?php include "menu.php"; ?>
    <h1>Login</h1>
    <div class="centrer">
    <div class="card" style="width: 40rem;">
        <form method="post" action="test.php">
            <input class="form-control" placeholder="Pseudo" type="text" name="pseudo"><br>
            <input class="form-control" placeholder="Mot de Passe" type="password" name="password"><br>
            <div class="center"><input class="btn btn-success" type="submit" name="submit" value="Me connecter"></div>
        </form>
    <div class="center"><a href="inscription.php"><button class="btn btn-danger">M'inscrire</button></a></div>
    </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>