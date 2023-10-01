<?php
session_start();
@$nom=$_POST['nom'];
@$prenom=$_POST['prenom'];
@$login=$_POST['login'];
@$pswd=$_POST['pswd'];
@$cpswd=$_POST['cpswd'];
@$valider=$_POST['valider'];
@$message="";
// var_dump($login);
if(isset($valider)){ 
    if(empty($nom)){
        $message="<li>Nom invalide</li>";
    }
    if(empty($prenom)){
        $message="<li>Prenom invalide</li>";
    }
    if(empty($login)){
        $message="<li>Login invalide</li>";
    }
    if($pswd != $cpswd) {
    $message = "<li>Mot de passe non identique!</li>";
    }
        
if(empty($message)) {
    $message = "Enregistrer avec succes!";
    include_once('connexion.php');
    $req = $pdo->prepare("SELECT id FROM user WHERE login=? limit 1");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($login));
    $tab = $req->fetchAll();
    // var_dump(count(($tab)));
    if(count($tab) < 1) {
        $ins = $pdo->prepare("INSERT INTO user (nom,prenom,login,password) VALUES (?,?,?,?)");
        // print_r($ins);
        $ins->execute(array($nom,$prenom,$login,$pswd));
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['id']=$_POST['id'];
        $_SESSION['autoriser']="oui";
        header("location:session.php");
    } else{
        $message="Ce login exite deja";
    }

    }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasinier</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
<div class="wrapper ">
        <div class="form-left">
            <h2 class="text-uppercase">BIENVENUE SUR NOTRE PLATEFORME DE GESTION DE MAGASIN</h2>
            <p>
           Bienvenue dans notre plateforme de gestion de magasin, conçue pour simplifier vos opérations quotidiennes. Que vous soyez un nouveau client ou que vous reveniez, nous sommes ravis de vous accueillir !
            </p>
            <p class="text">
            <span>Inscription :</span> Pour commencer, veuillez remplir tous les champs ci-dessous pour créer votre compte. Si vous possédez déjà un compte, cliquez sur le lien ci-dessous pour vous connecter et accéder à votre espace.
            </p>
            <div class="form-field">
                <a href="login.php"><input type="submit" class="account" value="Have an Account?"></a>
            </div>
            <footer class="footer mb-0 mt-5">
            &copy; 2023 all right reserved by NabiDev
            </footer>
        </div>
        <form class="form-right" method="post" action="">
            <h2 class="text-uppercase">Formulaire d'inscription</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="input-field" required autocomplete="of">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="input-field"  autocomplete="of" required>
                </div>
            </div>
            <div class="mb-3">
                <label>Nom d'utilisateur</label>
                <input type="email" class="input-field" name="login" required autocomplete="of">
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Mot de passe</label>
                    <input type="password" name="pswd" id="pswd" class="input-field" required >
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Confirmation</label>
                    <input type="password" name="cpswd" id="cpswd" class="input-field" required >
                </div>
            </div>
            <div class="form-field">
                <input type="submit" value="valider" class="register" name="valider">
            </div>
                <?php if(!empty($message)){?>
                    <div class="alert-danger"> <?php echo $message;?></div>
                   <?php }?>
           </div>
        </form>
    </div>
</html>