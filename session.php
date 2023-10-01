
<?php
 session_start();
 if($_SESSION['autoriser']!="oui"){
    header('location:login.php');
 }
 echo 'Bonjour '.$_SESSION['nom'].' '.$_SESSION['prenom'];
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasinier</title>
    <link rel="stylesheet" href="crud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
      <?php
                    require_once('fonctionCRUD.php');
                    echo "<table>";
                    echo "<tr classe= \"table-titre\"><th>Nom</th><th>Quantite</th><th>Prix</th><th>Action</th>";
                    
                    foreach(recupProductData() as $row) {
                        $id= $row["id"];
                        echo "<tr>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["quantite"]."</td>";
                        echo "<td>" . $row["prix"] . " CFA</td>";
                        echo " <td><button name='sup'onClick=\" confirm('Voulez vous vraiment supprimer ce revenu?')\";><a href=\"fonctionCRUD.php?id=$id\">supprimer</a></button></td>";
                        echo "</tr>";
                    }
                    echo"<tr class=\"add-produits\">";
                    echo "<td><a href=\"ajoutProduit.php\" class=\"noire\">Ajouter Produit <i class=\"fas fa-plus\"></i></a></td>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "</table>";
                 
                    echo "</table>";
         ?>
</body>