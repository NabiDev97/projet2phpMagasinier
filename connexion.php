<?php 
   try{
      $pdo=new PDO('mysql:host=localhost;dbname=bd_magasin','root','');
   }catch(PDOException $e){
      die('Erreur'.$e->getMessage());
   }
?>