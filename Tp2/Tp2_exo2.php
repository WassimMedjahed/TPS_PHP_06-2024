<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Associatif Sinus</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tableau Associatif des Valeurs Sinus</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Clé (X)</th>
                <th>Valeur (sin(X))</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Créer un tableau d'entiers de 1 à 63
            $integers = range(1, 63);
            
            // Créer un tableau de nombres variant de 0 à 6.3
            $step = 0.1;
            $numbers = range(0, 6.3, $step);
            
            // Créer un tableau associatif avec les clés variant de 0 à 6.3 et les valeurs sin(X)
            $sinValues = [];
            foreach ($numbers as $num) {
                $sinValues[(string)round($num, 1)] = sin($num);
            }
            
            // Afficher le tableau associatif dans un tableau HTML
            foreach ($sinValues as $key => $value) {
                echo "<tr>";
                echo "<td>" .$key . "</td>";
                echo "<td>" .$value. "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
