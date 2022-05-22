<?php
$conn = new mysqli("localhost", "root", "", "bac-2016");
$Y = $_POST["Y"];
$M = $_POST["M"];
$D = $_POST["D"];
$idPiece = $_POST["sl1"];
$idSalle = $_POST["sl2"];
$tm = mktime(0,0,0,$M,$D,$Y);
$tm = date("Y-m-d", $tm);
$req = "select * from spectacle where datespectacle='$tm' and idsalle='$idSalle';";
if($conn->query($req)->num_rows!=0){
    echo "salle est occupé";
}else{
    $req = "select * from spectacle where datespectacle='$tm' and idpiece=$idPiece;";
    if($conn->query($req)->num_rows!=0){
        echo "piece deja programmé";
    }else{
        $req = "insert into spectacle values('$idPiece', '$tm', '$idSalle')";
        if($conn->query($req)===TRUE){
            echo "ajouté effecute avec sucess";
        }else{
            echo "error";
        }
    }
}