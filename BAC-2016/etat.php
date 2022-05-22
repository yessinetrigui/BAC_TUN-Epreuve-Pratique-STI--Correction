<?php
$conn = new mysqli("localhost", "root", "", "bac-2016");
$l = getdate(time());
$y = $l["year"];
$req = "select titre, libelle, datespectacle from spectacle p, salle s, piece e
 where p.idpiece=e.idpiece and s.idsalle=p.idsalle and year(datespectacle)='$y' order by datespectacle, titre";
$res = $conn->query($req);
if($res->num_rows==0){
    echo "aucune spectacle";
}else{
    $i = 1;
    while ($l=$res->fetch_array()){
        echo "$i $l[0] $l[1] $l[2]  <br>";
        $i++;
    }
}