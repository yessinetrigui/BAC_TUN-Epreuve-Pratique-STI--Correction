<?php

$conn = new mysqli('localhost', 'root', '', 'bd0012');
$t =  $_POST['t'];
$req = "select * from client where telclt='$t';";
$res = $conn->query($req);
if($res->num_rows==0){
    echo "client n'exist pas !";
}else{
    $req = "select * from reclamation where telclt='$t' and etat='n';";
    $res = $conn->query($req);
    if($res->num_rows!=0){
        echo "le client a une reclamation non encore traité";
    }else{
        $desc =  $_POST['d'];
        $idcat = $_POST['sl'];
        $tm = date("Y-m-d H:i:s", time());
        $req = "INSERT INTO `reclamation`(`Description`, `Etat`, `DateRec`, `TelClt`, `IdCat`)
         VALUES ('$desc', 'N', '$tm', '$t', '$idcat');";
        if($conn->query($req)===TRUE){
            echo "reussite de l'operation.";
        }else{
            echo "jwk mch behi !".$conn->error;
        }
    }
}
