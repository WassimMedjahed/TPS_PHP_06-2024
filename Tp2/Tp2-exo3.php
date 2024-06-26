<?php
// Tableau contenant les adresses e-mail
$emails = [
    "hello@sfr.fr",
    "marc@sfr.fr",
    "estelle@sfr.fr",
    "caroline@sfr.fr",
    "hello@orange.fr",
	"goodbye@orange.fr",
	"justine@orange.fr",
	"hello@free.fr",
	"bob@free.fr"
];

// Tableau pour stocker les occurrences des fournisseurs d'accès
$domainCounts = [];

// Parcourir chaque adresse e-mail
foreach ($emails as $email) {
    // Extraire le domaine de l'adresse e-mail
    $parts = explode('@', $email);
    if (count($parts) == 2) {
        $domain = $parts[1]; // Le domaine est la deuxième partie après le '@'
        
        // Compter l'occurrence de ce domaine
        if (array_key_exists($domain, $domainCounts)) {
            $domainCounts[$domain]++;
        } else {
            $domainCounts[$domain] = 1;
        }
    }
}

// Total des adresses e-mail
$totalEmails = count($emails);

// Tableau pour stocker les pourcentages des fournisseurs d'accès
$domainPercentages = [];

// Calculer les pourcentages
foreach ($domainCounts as $domain => $count) {
    $percentage = ($count / $totalEmails) * 100;
    $domainPercentages[$domain] = $percentage;
}

// Tri des domaines par ordre alphabétique
ksort($domainCounts);
ksort($domainPercentages);

// Affichage des résultats en HTML
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des adresses e-mail par fournisseur</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Indice</th>
            <th>Adresse e-mail</th>
        </tr>
        <?php foreach ($emails as $index => $email): ?>
        <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>Indice</th>
            <th>Valeur</th>
        </tr>
        <?php foreach ($domainCounts as $domain => $count): ?>
        <tr>
            <td><?php echo htmlspecialchars($domain); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <table>
        <tr>
            <th>Indice</th>
            <th>Valeur</th>
        </tr>
        <?php foreach ($domainPercentages as $domain => $percentage): ?>
        <tr>
            <td><?php echo $domain; ?></td>
            <td><?php echo number_format($percentage, 2) . '%'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
