<?php 
session_start();
$conn = new mysqli("localhost",'root','',"moduleconnexion",3307);
echo $_SESSION['user_id'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $login_db = $user['login'];
    $prenom_db = $user['prenom'];
    $nom_db = $user['nom'];
} else {
    echo "Utilisateur introuvable.";
    exit();
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['update'])){
    update();
}
function update(){
    global $conn, $user_id;
    if ((isset($_POST['login'])&& isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['passwordconf']) && $_POST['password']=== $_POST['passwordconf'])){
       $login = $_POST['login'];
       $prenom = $_POST['prenom'];
       $nom = $_POST['nom'];
       $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
       $stmt = $conn->prepare("UPDATE utlisateurs SET login = ?, prenom = ?, nom = ?, password = ? WHERE id = ?");
       $stmt->bind_param('ssssi', $login, $prenom, $nom, $password, $user_id);
         if ($stmt->execute()=== true){
            echo 'mise a jour reussi';
         }
         else{
            echo 'echec de la mise a jour';
         }
    }
}
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