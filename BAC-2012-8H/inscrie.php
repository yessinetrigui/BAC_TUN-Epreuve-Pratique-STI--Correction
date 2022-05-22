<?php

$conn = new mysqli("localhost", "root", "", "bac-2012-8h");
$nu = $_POST['nu'];
$req = "select * from eleve where num='$nu';";
$res = $conn->query($req);
if($res->num_rows!=0){
    echo "eleve deja exisit";
}else{
    $n = $_POST['n'];
    $p = $_POST['p'];
    $g = $_POST['g'];
    $nv = $_POST['sl'];
    $req = "insert into eleve values('$nu','$n','$p','$g','$nv','N');";
    if($conn->query($req)===TRUE){
        echo "candidat bien ajouté";
    }else{
        echo "error";
    }
}