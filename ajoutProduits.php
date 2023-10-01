<!DOCTYPE html>
<html>
    <head>
    <title>Application de Gestion de Budgets</title>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width' initial-scale1.0">
         <link rel="stylesheet" href="PageAjout.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div id="main-container">

              <div id='pageAjoutTitle'>
                <h4 class='pageAjout'>Ajouter votre produit </h4>
              </diV>

              <div class='formulaire'>
                    <form method="post" >
                        <h3>Nom</h3>
                        <input type="text" name='nom'>
                        <h3>Quantite</h3>
                        <input type="number" id='qantite'  name="quantite">
                        <h3>Prix</h3>
                        <input type="number" id='prix'  name="prix">
                        <br>
                        <input type="submit" name="valider" id="submit" value="VALIDER">
                    </form>
                    <?php
        include_once('fonctionCRUD.php');
        extract($_POST);
        if(isset($valider)&& ($prix>0)){
            addProductData($nom,$quantite,$prix);
        }
        else echo "<script> alert('Impossible d\'ajouter cette depense revoyer votre saisie svp');</scrip>";

        ?>         
              </div>
        </div> 
    </body>
</html>