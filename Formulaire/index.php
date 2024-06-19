<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['mdp'])) {
            $_SESSION['email'] = $email;
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Utilisateur non trouvé";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post" action="index.php">
            <input type="email" name="email" placeholder="E-mail" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <button type="submit">Se connecter</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
    </div>
</body>
</html>
