<?php

$conn = new mysqli('localhost', 'root', '', 'bac-2014-8h');
$m = $_POST['m'];
$n = $_POST['n'];
$p = $_POST['p'];
$req = "select * from patient where mat='$m';";
if($conn->query($req)->num_rows!=0){
    echo "patient deja exisit";
}else{
$req= "insert into patient values('$m','$n','$p');";
if($conn->query($req)===TRUE){
    echo "patient ajoutee";
}else{
    echo "erorr ajout";
}
}