<?php
$conn = new mysqli('localhost', 'root', '', 'bac-2019');
$mail = $_POST['m'];
$p = $_POST['mdp'];
$q1=$_POST['q1'];
$q2=$_POST['q2'];
$q3=$_POST['q3'];
$req = "select mdp from Participant where mail='$mail';";
$res = $conn->query($req);
if($res->num_rows!=0){
    $pass_bd = $res->fetch_array()[0];
    if($pass_bd!=$p){
        echo "errur d'authentification";
    }else{
        $idpart = $conn->query("select IdParticipant from Participant where mail='$mail';")->fetch_array()[0];
        $req = "select * from Reponse where IdParticipant='$idpart'";
        
        if($conn->query($req)->num_rows==0){
            //macherkch fl sondage
            $D1 = false;
            $D2 = false;
            $D3 = false;
            $req = "insert into reponse values(1, 1, '$idpart', '$q1');";
            $D1=$conn->query($req);

            $req = "insert into reponse values(2, 1, '$idpart', '$q2');";
            $D2=$conn->query($req);

            $req = "insert into reponse values(3, 1, '$idpart', '$q3');";
            $D3=$conn->query($req);
            if($D1 AND $D2 AND $D3){
                echo "Participation au
                sondage effectuée avec succès";
            }
        }else{
            //cherek fl sondage
            $D1 = false;
            $D2 = false;
            $D3 = false;
            $req = "update reponse set Rep='$q1' where IdParticipant='$idpart' and 
            NumQ=1 and NumS=1;";
            $D1=$conn->query($req);
            $req = "update  reponse set Rep='$q2' where IdParticipant=$idpart and 
            NumQ=2 and NumS=1;";
            $D2=$conn->query($req);
            $req = "update  reponse set Rep='$q3' where IdParticipant=$idpart and 
            NumQ=3 and NumS=1;";
            $D3=$conn->query($req);
            if($D1 AND $D2 AND $D3){
                echo "Mise à
                jour effectuée avec succès";
            }
           
        }
    }
}else{
    // new person
    $mdp = $_POST['mdp'];
    $g = $_POST['sl'];
    $req = "insert into Participant (Mail,Mdp,Genre) values('$mail', '$mdp', '$g');";
    $D1 = false;
    $D2 = false;
    $D3 = false;
    $D4 = false;

    $D1=$conn->query($req);

    $idpart = $conn->query("select IdParticipant from Participant where mail='$mail';")->fetch_array()[0];

    $req = "insert into reponse values(1, 1, '$idpart', '$q1');";
    $D2=$conn->query($req);

    $req = "insert into reponse values(2, 1, '$idpart', '$q2');";
    $D3=$conn->query($req);

    $req = "insert into reponse values(3, 1, '$idpart', '$q3');";
    $D4=$conn->query($req);
    if($D1 AND $D2 AND $D3 AND $D4){
        echo "Inscription et participation au sondage effectuées avec succès";
    }

}
