<?php
// Vérification du login et du mot de passe
$login_valide = "test@test.com"; 
$mot_de_passe_valide = "123"; 

$login = $_POST['login'];
$mot_de_passe = $_POST['psw'];

// Vérification des identifiants
if ($login == $login_valide && $mot_de_passe == $mot_de_passe_valide) {
    // Authentification réussie
    session_start();
    $_SESSION['login'] = $login;
    header('Location: home.php'); // Redirection vers home.php si authentification réussie
    exit();
} else {
    // Authentification échouée
    header('Location: login.php?error=login'); // Redirection vers login.php avec message d'erreur
    exit();
}
?>
