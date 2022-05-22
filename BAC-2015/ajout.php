<?php
if(isset($_POST["G"])){
    $conn = new mysqli("localhost", "root", "", "BD030415");
    $m = $_POST['m'];
    $req = "select * from pilote where matricule='$m';";
    if($conn->query($req)->num_rows!=0){
        echo "pilote deja exist !";
    }else{
        $n = $_POST['n'];
        $p = $_POST['p'];
        $g = $_POST['g'];
        $e = $_POST['e'];
        $req = "insert into pilote values('$m','$n','$p','$g','$e');";
        if($conn->query($req)===TRUE){
            echo "inserted success.";
        }else{
            echo "error:";
        }
    }
}