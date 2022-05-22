<?php

$conn = new mysqli('localhost', 'root', '', 'bac-2014-8h');
$tm = date("Y-m-d", time());
$req = "select nom,prenom,datecons,detailcons from consultation c, patient p where datecons='$tm' and c.mat = p.mat";
$res = $conn->query($req);
if($res->num_rows==0){
    echo "aucune consultaion aujourdhui";
}else{
    while($l=$res->fetch_array()){
        echo "$l[0] $l[1] $l[2] $l[3] <br>";
    }
}