<?php
$admin = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
        <form method="post" action="admin.php">
            <button type="submit" name="connexion">Page admin</button>
        </form>
</body>
</html>
HTML;

echo $admin;
?>
