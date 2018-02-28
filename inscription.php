<?php include 'header.php'; ?>
<body>
    <?php include "menu.php"; ?>
    <h1>Inscription</h1>
    <div class="centrer">
    <div class="card" style="width: 40rem;">
        <form method="post" action="inscri.php">
            <input class="form-control" id="input" placeholder="Pseudo" type="text" onKeyUp="add(this.value)" name="pseudo">
            <span id="verif"></span><br>
            <input class="form-control" placeholder="Mot de Passe" type="password" name="password"><br>
            <input class="form-control" placeholder="Confirmer Mot de Passe" type="password" name="password2"><br>
            <div class="center"><input class="btn btn-success" type="submit" name="submit" value="M'inscrire"></div>
        </form>
    <div class="center"><a href="login.php"><button class="btn btn-danger">Me connecter</button></a></div>
    </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>