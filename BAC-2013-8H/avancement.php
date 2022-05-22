<?php
$conn = new mysqli("localhost", "root", "", "bac-2013-8h");
$req0 = "select count(*) from eleve;";
$nt = $conn->query($req0)->fetch_array()[0];
$req1 = "select count(*) from note where codematiere='Algo';";
$a = $conn->query($req1)->fetch_array()[0];

$req2 = "select count(*) from note where codematiere='BD';";
$bd = $conn->query($req2)->fetch_array()[0];

$req3 = "select count(*) from note where codematiere='Tic';";
$tic = $conn->query($req3)->fetch_array()[0];

echo "pourcentage pour: <br>";
echo "algo:". ($a/$nt)*100 . "%";
echo "<br>";
echo "BD:". ($bd/$nt)*100 . "%";
echo "<br>";
echo "TIC:" .($tic/$nt)*100 ."%";
