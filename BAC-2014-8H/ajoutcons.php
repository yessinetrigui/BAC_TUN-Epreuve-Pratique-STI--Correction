<?php

$conn = new mysqli('localhost', 'root', '', 'bac-2014-8h');
$m = $_POST['m'];
$req = "select * from patient where mat='$m';";
if($conn->query($req)->num_rows==0){
    echo "patient n'exist pas";
}else{

    $d = $_POST['d'];
    $j = $_POST['j'];
    $tm = date("Y-m-d", time());

    if($j>0){
        $s = time()+($j*(24*60*60));
        $tm2 = date("Y-m-d", $s);
        $req= "insert into consultation values('$m','$tm','$tm2', '$d');";

    }else{
        $req= "insert into consultation values('$m','$tm', NULL, '$d');";

    }
    if($conn->query($req)===TRUE){
        echo "consultation ajoutee";
    }else{
        echo "erorr ajout";
    }
}