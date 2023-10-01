<?php
    require_once('connexion.php');

    // Enregistrement des donnees dans la table produits
    function addProductData($nom,$quantite,$prix){
            global $pdo;
            $req=$pdo->prepare('INSERT into produits nom,quantite,prix VALUES(?,?,?)');
            $req->execute($nom,$quantite,$prix);
            $donnees=$req->fetchAll();
            return($donnees);
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
    function delProductData(){
        global $id;
        die (var_dump($id));
        global $pdo;
        $req=$pdo->query('DELETE FROM produits WHERE id=?');
        $req->execute($id);
        $donnees=$req->fetchAll();
        return($donnees);
    }
?>
