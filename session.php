
<?php
 session_start();
 if($_SESSION['autoriser']!="oui"){
    header('location:login.php');
 }
 echo 'Bonjour '.$_SESSION['nom'].' '.$_SESSION['prenom'];