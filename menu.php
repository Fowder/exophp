   <nav>
   <?php if(isset($_SESSION['pseudo'])) { echo '<li class="nav-item" id="pseudo"><span>Bonjour '.$_SESSION['pseudo'].'</span></li>'; } ?>
   <ul class="nav nav-tabs">
 <li class="nav-item">
   <a class="nav-link" href="index.php">Home</a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="apropos.php">A propos</a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="evenement.php">Evenement</a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="blog.php">Blog</a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="contact.php">Contact</a>
 </li>
 <?php if(!isset($_SESSION['pseudo'])) {echo '<li class="nav-item"><a class="text-success nav-link" href="login.php">Login</a></li>'; } ?>
 <?php if(isset($_SESSION['pseudo'])) { echo '<li class="nav-item"><a class="text-danger nav-link" href="logout.php">Logout</a></li>'; } ?>
</ul>
    </nav>