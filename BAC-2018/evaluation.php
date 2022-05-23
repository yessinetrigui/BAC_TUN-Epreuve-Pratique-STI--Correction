<?php
$conn = new mysqli("localhost", 'root', '', 'bac-2018');
$id = $_POST['sl'];
$a = $_POST['a'];
$r = $_POST['r'];
$ne = 0;

if(isset($_POST['po'])){
    $ne = $ne + $_POST['po'];
}
if(isset($_POST['pp'])){
    $ne= $ne +$_POST['pp'];
}

if(isset($_POST['cw'])){
    $ne= $ne +$_POST['cw'];
}

$tm = date("Y-m-d", time());
$rq = "select * from evaluation where dateeval='$tm' and idhotel='$id'";
if($conn->query($rq)->num_rows!=0){
    echo "hotel deja evaluer aujourdhui !";
}else{
    $req = "insert into evaluation values('$tm','$id','$a','$r','$ne')";
    if($conn->query($req)===TRUE){
        echo "hotel bien evaluer";
    }
}

$req = "select nomHotel, avg(noteacceuil), avg(noterest), avg(noteExtra) from 
hotel h, evaluation e where e.idhotel=h.idhotel group by h.idhotel;";
$res = $conn->query($req);
$i = 0;
echo "<table border=2>
<tr>
<td>N:</td>
<td>Hotel</td>
<td>Acceuil</td>
<td>Restauration</td>
<td>Extra</td>
</tr>
";
while($l=$res->fetch_array()){
    echo "<tr> 
        <td>$i</td>
        <td>$l[0]</td>
        <td>$l[1]</td>
        <td>$l[2]</td>
        <td>$l[3]</td>
    </tr>";
    $i++;
}
echo "</table>";
