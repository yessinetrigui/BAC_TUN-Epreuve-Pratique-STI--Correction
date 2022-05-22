<?php

$conn = new mysqli("localhost", "root", "", "bac-2012-8h");
$en = $_POST['en'];
$req = "select * from eleve where num='$en';";
$res = $conn->query($req);
if($res->num_rows==0){
    echo "eleve n'exisit pas";
}else{
    $f = $_POST['f'];
    $g = $_POST['g'];
    $req = "select * from vote where nume='$en';";
    $res = $conn->query($req);
    if($res->num_rows!=0){
        echo "vous avez deja voté !";
    }else{
        $req1 = "select num from eleve where num='$f' or num='$g'";

        $res = $conn->query($req1);
        while ($l=$res->fetch_array()){
            $req = "insert into vote values('$en','$l[0]');";
            if($conn->query($req)===TRUE){
                echo "vote ressuite pour $l[0] <br>";
            }else{
                echo "error";
            }
        }
    }
    
   
}