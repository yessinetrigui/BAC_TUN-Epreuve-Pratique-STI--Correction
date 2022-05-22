<?php
$con = new mysqli('localhost', 'root', '', 'bd0012');
$t=$_POST['t'];
$d=$_POST['d'];
$req="select * from client where TelClt='$t'";
$req1="select * from reclamation where TelClt='$t' and Etat='N'";
$res=$con->query($req);
$res1=$con->query($req1);
if($res->num_rows==0){
    echo('acune client');

}else if ($res1->num_rows==0) {
    echo('acune reclamation non traitee pour ce client');
}else{
    $req2="update reclamation set etat='O', DateRep='$d' where TelClt='$t' and etat='N'";
    $con->query($req2);
    echo('modification avec success');
}