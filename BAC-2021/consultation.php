<meta charset="UTF-8">

<?php

$con = new mysqli("localhost", "root", "", "bd_bac2021");
$ST = $_POST['sl'];
if(isset($_POST['r'])){
    if($_POST['r']=="temp"){
        $X = 3;
        $pfx = "°C";
    }else{
        $X = 4;
        $pfx = "mm";
    }
}

$rq = "select * from station where Nom='$ST';";
$Td = $con->query($rq)->fetch_array();
$req="select * from mesure where IdStation = '$Td[0]';";
$res = $con->query($req);
if($res->num_rows == 0){
    echo "non trouvé";
}else{
    echo "
    <center>
        <table border=2>
        <tr><th colspan=3>Station $ST</th></tr>
        <tr>
            <th>Saison</th>
            <th>Anné</th>
            <th>Mesures Enregistré</th>
        </tr>
    ";
    echo($res->num_rows);
    while($L = $res->fetch_array()){
        echo "
            <tr>
                <td>$L[2]</td>
                <td>$L[1]</td>
                <td>$L[$X] $pfx</td>
            </tr>
        ";
    }
    echo "</table></center>";
}