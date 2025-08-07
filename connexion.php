<?php
$conn = new mysqli("localhost", "root", "", "moduleconnexion",3306);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connexion'])) {
    connexion();
}
function connexion(){
    global $conn;
    if (isset($_POST['login']) && isset($_POST['password'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0){
           $stmt->bind_result($id, $login_db,$prenom, $nom, $password_hash);
            $stmt->fetch();
            if (password_verify($password, $password_hash)){
                echo 'connexion';
                session_start();
                $_SESSION['user_id'] = $id;
                header("Location: profil.php");
                exit();
            } else {
                echo 'Mot de passe incorrect';
            }
        }

    }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #2980b9 0%, #6dd5fa 100%);
            font-family: 'Montserrat', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 370px;
            margin: 90px auto;
            padding: 35px 30px 30px 30px;
            background: rgba(255,255,255,0.97);
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255,255,255,0.18);
        }
        h2 {
            text-align: center;
            margin-bottom: 28px;
            color: #2980b9;
            font-weight: 600;
            letter-spacing: 1px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #444;
            font-size: 15px;
            font-weight: 500;
        }
        .input-group {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 15px;
            background: #f7fafd;
            transition: border 0.2s;
            outline: none;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border: 1.5px solid #2980b9;
            background: #fff;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #2980b9 0%, #6dd5fa 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(41,128,185,0.08);
            transition: background 0.2s, transform 0.1s;
        }
        button:hover {
            background: linear-gradient(90deg, #2574a9 0%, #48c6ef 100%);
            transform: translateY(-2px) scale(1.02);
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #2980b9;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: color 0.2s;
        }
        .register-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 18px;
        }
        .logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(41,128,185,0.12);
        }
    </style>
</head>
<body>
    <div class="login-container">
        
        <h2>Connexion</h2>
        <form method="post" action="connexion.php">
            <div class="input-group">
                <label for="login" >Login</label>
                <input type="text" id="login" name="login" required>
            </div>
            
             <div class="input-group">
                <label for="password">password</label>
                <input type="text" id="password" name="password" required>
            </div>
            <button type="submit" name="connexion">Se connecter</button>
        </form>
        <a class="register-link" href="inscription.php">Créer un compte</a>
    </div>
</body>
</html>