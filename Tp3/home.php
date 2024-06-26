<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer le login de l'utilisateur depuis la session
$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            font-family: Calibri, sans-serif;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .logout-link {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenue, <?php echo htmlspecialchars($login); ?>!</h2>
        <p>Vous êtes connecté à la page d'accueil.</p>
        <div class="logout-link">
            <a href="logout.php" class="btn btn-primary">Déconnexion</a>
        </div>
    </div> <!-- /container -->
</body>
</html>
