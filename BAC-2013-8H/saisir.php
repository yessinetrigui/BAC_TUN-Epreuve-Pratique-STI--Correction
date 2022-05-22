<?php
$conn = new mysqli("localhost", "root", "", "bac-2013-8h");
$m = $_POST['ne'];
$req = "select * from eleve where numero='$m';";
if($conn->query($req)->num_rows==0){
    echo "eleve n'exist pas!";
}else{
    $cm = $_POST['sl'];
    $req = "select * from note where numeleve='$m' and codematiere='$cm';";
    if($conn->query($req)->num_rows!=0){
        echo "note de l'evele pour cette matier est deja saisie";
    }else{
        $dc = $_POST['dc'];
        $ds = $_POST['ds'];
        $req = "insert into note values('$m','$cm','$dc','$ds')";
        if($conn->query($req)===TRUE){
            echo "note bien ajouter";
        }else{
            echo"error";
        }
    }

}