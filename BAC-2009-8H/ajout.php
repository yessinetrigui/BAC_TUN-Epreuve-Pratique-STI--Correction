<?php

$conn = new mysqli('localhost', 'root', '', 'bac-2009-8H');
$c = $_POST['c'];
$n = $_POST['n'];
$p = $_POST['p'];
$ex1 = $_POST['ex1'];
$ex2 = $_POST['ex2'];
$sm = $_POST['sm'];
$lr = $_POST['lr'];
$ec = $_POST['ec'];
$pts = 0;
if($ex1=="+,-,*,/"){
    $pts = $pts + 4;
}
if($ex2=="MOD"){
    $pts = $pts + 4;
}
if($sm==2){
    $pts = $pts + 4;
}
if($lr==1){
    $pts = $pts + 4;
}
if($ec==3){
    $pts = $pts + 4;
}
$req = "insert into examen values('$c', '$n', '$p', '$pts');";
if($conn->query($req)===TRUE){
    echo "BIEN AJOUTEE";
}else{
    echo"eerror".$conn->error;
}