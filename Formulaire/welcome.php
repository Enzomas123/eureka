<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <title>Bienvenue</title>
</head>
<body>
    <div class="into">
        <h2>Bienvenue dans l'application</h2>
        <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['email']); ?> !</p>
        <p><a href="logout.php">Se déconnecter</a></p>
       <div>
  <p>Bienvenue,chers Utilisateur <br> Nous vous remercions de nous faire confiance! Dans cette plateforme nous mettons diverse servive a votre disposition <br>
  priere de nous faire savoir quel est votre besoin
  </p>
</div>
    </div>
    <footer>
        <hr>
        <div>
            <p>veuillez nous contactez par ce number <br>
        +243978911478
    par notre adresse mail <a class=mailto href="rjchrismoyi@gmail.com" >Cliquer ici</a></p>
        </div>
    </footer>

    
</body>
</html>
