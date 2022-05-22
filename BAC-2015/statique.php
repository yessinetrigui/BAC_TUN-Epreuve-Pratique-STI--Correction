<?php
if(isset($_POST["G"])){
    $conn = new mysqli("localhost", "root", "", "BD030415");
    $sl = $_POST['sl'];
    $req = "select * from pilote where matricule='$sl';";
    $res = $conn->query($req);
    if($res->num_rows==0){
        echo "pilote n'a acune vol !";
    }else{
        $l = $res->fetch_array();
        echo "$l[1] $l[2] a effectué les vols suivants: ";
        $req = "select marque, sum(duree), count(datedep) from avion a, vol v where a.idavion = v.idavion AND matpilote='$sl' GROUP by v.idavion";
        $res = $conn->query($req);
        while($l = $res->fetch_array()){
            echo "Marque: $l[0] Total duree: $l[1]  nombre vols:$l[2]";

        }


    }
}