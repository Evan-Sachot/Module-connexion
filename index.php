<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <button class="menu-btn">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Utilisateur" class="user-icon">
                </button>
                <div class="dropdown-content">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profil.php">Profil</a>
                        <a href="logout.php">Se déconnecter</a>
                    <?php else: ?>
                        <a href="inscription.php">S'inscrire</a>
                        <a href="connexion.php">Se connecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <footer>
        <div class="footer">
            <p>A propos</p>
            <p>Contact</p>
        </div>
    </footer>
</body>
</html>