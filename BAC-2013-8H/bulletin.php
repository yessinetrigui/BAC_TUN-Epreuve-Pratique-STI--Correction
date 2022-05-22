<?php
$conn = new mysqli("localhost", "root", "", "bac-2013-8h");
$m = $_POST['ne'];
$req = "select * from eleve where numero='$m';";
if($conn->query($req)->num_rows==0){
    echo "eleve n'exist pas!";
}else{
    $req2 = "select * from note where numeleve='$m';";
    $res = $conn->query($req2);
    if($res->num_rows!=3){
        echo "eleve note incomplete";
    }else{
        $req = "select nomprenom from eleve where numero='$m';";
        $nomprenom= $conn->query($req)->fetch_array()[0];

        echo "
        <table border=2>
            <tr><td>Bulletin de notes de l'eleve: </td> <td>$nomprenom</td></tr>
        ";
        $moyg=0;
        while($l=$res->fetch_array()){
            $moyg+=($l[3]+$l[2])/2;
            $resMat = $conn->query("select libelle,coef from matiere where code='$l[1]';")->fetch_array();
                echo " <tr><td>$resMat[0]: </td> <td>$resMat[1]</td><td>$l[2]</td><td>$l[3]</td><td>" . ($l[3]+$l[2])/2 . "</td><td>" . $resMat[1]*(($l[3]+$l[2])/2) . "</td></tr>        
";
        }
        echo "</table>";
        echo "moyenne generale: " . $moyg/3;
    }
}