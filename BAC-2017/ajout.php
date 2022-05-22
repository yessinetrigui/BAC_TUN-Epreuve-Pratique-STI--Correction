<?php
$conn = new mysqli("localhost", "root", "", "bac-2017");
$pp = $_POST['pp'];
$a = $_POST['sl'];
$req = "select prixbase from article where code='$a';";
$pb = $conn->query($req)->fetch_array()[0];
if($pp<$pb){
    echo"offre rejeté";
}else{
    $c = $_POST['c'];
    
    $req = "select * from client where cin='$c';";
    if($conn->query($req)->num_rows==0){
        $n = $_POST['n'];
        $p = $_POST['p'];
        $t = $_POST['t'];
        $req1 = "insert into client values('$c','$n','$p','$t');";
        $req2 = "insert into offre values('$c','$a','$pp');";
        if($conn->query($req1)===TRUE){
            echo "client bien ajouté";
        }
        if($conn->query($req2)===TRUE){
            echo "offre bien ajouté pour ce nouveau client";
        }
    }else{
        
        $rq = "select * from offre where cin='$c' and code='$a';";
        if($conn->query($rq)->num_rows==0){
            $req2 = "insert into offre values('$c','$a','$pp');";
            if($conn->query($req2)===TRUE){
                echo "nouvelle offre bien enregistre";
            }
        }else{
            $req2 = "update offre set prixpropose='$pp' where cin='$c' and code='$a';";
            if($conn->query($req2)===TRUE){
                echo "mise a jour fait avec succes";
            }
        }
        
    }
}