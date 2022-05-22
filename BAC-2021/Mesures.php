<?php

$con = new mysqli("localhost", "root", "", "bd_bac2021");
$ST = $_POST['sl1'];
$SA = $_POST['sl2'];
$A = $_POST['r'];
$T = $_POST['t'];
$P = $_POST['p'];
$rq = "select * from station where Nom='$ST';";
$Td = $con->query($rq)->fetch_array();
$req="select * from mesure where IdStation = '$Td[0]' and Anne='$A' and Saison='$SA';";
$res = $con->query($req);
if($res->num_rows != 0){
    echo "Already exist";
}else{
    $req2 = "Insert into mesure values('$Td[0]','$A','$SA','$T','$P');";
    if($con->query($req2)===TRUE){
        echo "Bien ajouter";
    }else{
        echo "error".$con->error;
    }
}