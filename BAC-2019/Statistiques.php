<?php
$conn = new mysqli('localhost', 'root', '', 'bac-2019');
$idST = $_POST['sl'];
$tm = date('Y-m-d', time());
$req = "select datedebut from Sondage where nums='$idST' and datedebut<='$tm';";
if($conn->query($req)->num_rows==0){
    echo "Sondage non encore lancé !";
}else{
    $req = "select * from reponse where nums='$idST';";
    if($conn->query($req)->num_rows==0){
        echo "Aucune participation enregistrée à ce moment !";
    }else{
        echo "Satistique du sondage:";
        $nbTot = $conn->query("select count(DISTINCT(IdParticipant)) from reponse where nums='$idST';")->fetch_array()[0];
        $nbF = $conn->query("select count(DISTINCT(r.IdParticipant)) from reponse r, participant p where p.IdParticipant=r.IdParticipant and genre='f' and  nums='$idST';")->fetch_array()[0];
        $nbH = $conn->query("select count(DISTINCT(r.IdParticipant)) from reponse r, participant p where p.IdParticipant=r.IdParticipant and genre='m' and  nums='$idST';")->fetch_array()[0];
        echo "<table border=1>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td colspan=3>Pourcentage</td>
            </tr>
            <tr>
            <td>N</td> 
            <td>Question</td> 
            <td>Oui</td> 
            <td>Non</td> 
            <td>Sans Avis</td> 
            </tr>
        ";
        $req = "select numq, question, count()";
        //mezel el table de satistique;
    }
}
