<?php
if(isset($_POST['REQ'])){
    echo "DONE";
    $conn = new mysqli("127.0.0.1", "root", "", "bac-sti-Pratique-2020");
    if($conn->connect_error){
        dir("Connection Error !", $conn->error);
    }
    $tp = $_POST['tp'];
    $q = $_POST['q'];
    $t = $_POST['t'];
    $m = $_POST['m'];
    $req1 = "select * from client where Tel='$t' and MotPass='$m';";
    $res = $conn->query($req1);
    if($res->num_rows==0){
        echo "Tel ou mot de pass errorné";
    }else{
        $DT = date("Y-m-d H:i:s",time());
        $req = "insert into commande values('$tp', '$t', '$DT', '$q');";
        if($conn->query($req)===TRUE){
            echo "<h1 style='color: red;'>Merci Pour Votre Commande. =)<b></b></h1>";
        }else{
            echo "ERROR INSCRIPTION". $conn->error;
        }
    }
    $conn->close();
}else{
    echo "Acess Denied !";
}