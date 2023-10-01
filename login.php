<?php
    session_start();
    include_once('connexion.php');  
    @$login=$_POST['login'];
    @$pswd=$_POST['pswd'];
    @$nom=$_POST['nom'];
    @$prenom=$_POST['prenom'];
    if(isset($_POST['register'])){
        $req=$pdo->prepare("SELECT id,nom,prenom FROM user WHERE login=? AND password=? LIMIT 1");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute(array($_POST['login'],$_POST['pswd'])); 
        $tab=$req->fetchAll();
        // die(var_dump($tab[0]['nom']));
        if(count($tab) > 0){
            $_SESSION['autoriser']="oui";
            $_SESSION['nom']= $tab[0]['nom'];
            $_SESSION['prenom']= $tab[0]['prenom'];
            header('location:session.php');
        } else $message="Login ou mots de passe invalide";    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le magasinier</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
<div class="wrapper ">
        <div class="form-left">
            <h2>Bienvenue dans votre application "Le Magasinier"</h2>
             <img src="magasin.jpg" alt="">
            <div class="form-field">
                <a href="inscription.php"><input type="submit" class="account" value="S'inscrire!" required></a>
                <footer class="footer mb-0 mt-5">
                     &copy; 2023 all right reserved by NabiDev
                </footer>
            </div>
        </div>
        <form class="form-right" method="post" action="" required >
            <h2 class="text-uppercase">Page d'authentification</h2>
            <div class="mb-3">
                <label for="login">Nom d'utilisateur</label>
                <input type="email" class="input-field" name="login" id="login" required autocomplete="of" >
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="pswd">Mot de passe</label>
                    <input type="password" name="pswd" id="pswd" class="input-field" required>
                </div>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register" required>
            </div>
            <?php if(isset($message)){?>
                <div class="alert-danger"><?="$message"?></div>
           <?php  } ?>
        </form>
    </div>
</html>