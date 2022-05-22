<?php
if(isset($_POST['REQ'])){
    echo "DONE";
    $conn = new mysqli("127.0.0.1", "root", "", "bac-sti-Pratique-2020");
    if($conn->connect_error){
        die("Connection Error !". $conn->error);
    }
    $nom = $_POST['n'];
    $prenom = $_POST['p'];
    $tel = $_POST['t'];
    $adr = $_POST['a'];
    $mdp = $_POST['m'];
    $req1 = "select * from client where Tel='$tel';";
    $res = $conn->query($req1);
    $TL = $res->fetch_array();
    if($res->num_rows == 0){
        $req = "insert into client values('$tel', '$nom', '$prenom', '$adr', '$mdp');";
        if($conn->query($req)===TRUE){
            echo "<h1 style='color: red;'>Merci Pour Votre Inscription. =)<b></b></h1>";
        }else{
            echo "ERROR INSCRIPTION". $conn->error;
        }
    }else{
        if($TL["Nom"]==$nom && $TL["Prenom"]==$prenom){
            echo "<h1 style='color: red;'>Client Deja Existe. =)<b></b></h1>";
        }else{
            echo "<h1 style='color: red;'>Error Nom, Tel, ou Prénom Erroné. =)<b></b></h1>";
        }
    }
    
    $conn->close();
}else{
    echo "Acess Denied !";
}