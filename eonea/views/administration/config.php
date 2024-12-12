<?php
    if(isset($_POST['email']) && isset($_POST['password'])){      
        
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_données ="platform";
        $con =mysqli_connect($nom_serveur , $utilisateur , $mot_de_passe , $nom_base_données);
        //requete pour selectionner l'utilisateur
        $req = mysqli_query($con , "SELECT * FROM users WHERE email = '$email' AND password ='$password'");
        $num_ligne = mysqli_num_rows($req);
        if($num_ligne >1){
        header("location : soumission.php");
        }else{
            echo "Adresse mail ou mot de passe incorrect"
        }
    }

?>