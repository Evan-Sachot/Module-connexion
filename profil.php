<?php 
session_start();
echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        
        <h2>inscription</h2>
        <form method="POST" >
            <div class="input-group">
                <label for="login" >Login</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="input-group">
                <label for="prenom" >Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
              <div class="input-group">
                <label for="nom" >Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>
             <div class="input-group">
                <label for="password">password</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="passwordconf">confirmer le mot de passe</label>
                <input type="text" id="passwordconf" name="passwordconf" required>
            </div>
            <button type="submit" name="inscription">s'inscrire</button>
            <a class="register-link" href="connexion.php">Se connecter</a>
        </form>
    </div>
</body>
</html>