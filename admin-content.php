<?php
require 'admin.php'; // ensures $conn is available

// Prepare table rows string
$tableRows = '';
$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableRows .= "<tr>";
        $tableRows .= "<td>" . htmlspecialchars($row['id']) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($row['login']) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($row['nom']) . "</td>";
        $tableRows .= "<td style='font-size:11px;'>" . htmlspecialchars($row['password']) . "</td>";
        $tableRows .= "</tr>";
    }
} else {
    $tableRows .= "<tr><td colspan='5'>Aucun utilisateur trouvé.</td></tr>";
}

// HTML content with heredoc
$content = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
            background: #fff;
        }
        th, td {
            border: 1px solid #2980b9;
            padding: 10px 16px;
            text-align: center;
        }
        th {
            background: #2980b9;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f7fafd;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Password (hash)</th>
            </tr>
        </thead>
        <tbody>
            $tableRows
        </tbody>
    </table>
        <form method="post" action="index.php">
            <button type="submit" name="connexion">Retour à l'accueil</button>
        </form>
</body>
</html>
HTML;

echo $content;
?>
