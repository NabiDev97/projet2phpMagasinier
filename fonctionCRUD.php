<?php
    require_once('connexion.php');

    // Enregistrement des donnees dans la table produits
    function addProductData($nom,$quantite,$prix){
            global $pdo;
            $req=$pdo->prepare('INSERT into produits (nom,quantite,prix) VALUES(?,?,?)');
            $req->execute(array($nom,$quantite,$prix));
            header('location:session.php');
    }

    // recuperation des donnees dans la taable produits
    function recupProductData(){
        global $pdo;
        $req=$pdo->query('SELECT * FROM produits');
        $req->execute();
        $donnees=$req->fetchAll();
        return($donnees);
    }
    
    // supresion de donees dans la table produits
    // $id=$_POST['id'];
    // die(var_dump($id));
    function delProductData($id){
        global $pdo;
        $req=$pdo->prepare('DELETE FROM produits WHERE id=?');
        if(!empty($id));
        $req->execute(array($id));
    }
    if(!empty($_GET['id'])){
        delProductData($_GET['id']);
        header('location:session.php');
    }
    
    ?>