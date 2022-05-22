<?php
$conn = new mysqli("localhost", "root", "", "bac-2012-8h");
$req = "select nom,prenom,count(v.nume) from eleve e, vote v where e.num=v.numc and candidat='O' GROUP BY e.num;";
$res = $conn->query($req);
while ($l=$res->fetch_array()){
    echo "$l[0] $l[1] total vote: $l[2] <br>";
}