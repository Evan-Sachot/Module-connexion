<?php 
session_start();
$conn = new mysqli("localhost",'root','',"moduleconnexion",3307);
echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise a jour des informations</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        
        <h2>inscription</h2>
        <form method="POST" >
            <div class="input-group">
                <label for="login" >Login</label>
                <input type="text" id="login" name="login" value="<?php echo $login_db; ?>" required>
            </div>
            <div class="input-group">
                <label for="prenom" >Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom_db; ?>" required>
            </div>
              <div class="input-group">
                <label for="nom" >Nom</label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom_db; ?>" required>
            </div>
             <div class="input-group">
                <label for="password">password</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="passwordconf">confirmer le mot de passe</label>
                <input type="text" id="passwordconf" name="passwordconf" required>
            </div>
            <button type="submit" name="update">Update</button>
            <a class="register-link" href="connexion.php">Se connecter</a>
        </form>
    </div>
</body>
</html>