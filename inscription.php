<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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
        <form method="post" >
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
            <button type="submit">s'inscrire</button>
        </form>
    </div>
</body>
</html>
<?php
$conn = new mysqli("localhost", "root", "", "moduleconnexion",3307);
function inscription(){
if (isset($_POST['login'])&& isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['passwordconf']) && $_POST['password']=== $_POST['passwordconf']){
    $login= $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    global $conn;
    $sql = "insert into users (login,prenom,nom,password) values ('$login','$prenom','$nom','$password')";
     if ($conn->query($sql)=== TRUE){
        echo "<script>alert('inscription réussie');</script>";
     }else{
        echo "<script>alert('inscription échouée');</script>";
     }

}}
var_dump($conn);
?>