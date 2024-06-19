<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO utilisateurs (email, mdp) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Erreur lors de la création du compte : " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="post" action="register.php">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <button type="submit">S'inscrire</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <p>Déjà un compte ? <a href="index.php">Connectez-vous</a></p>
    </div>
</body>
</html>
