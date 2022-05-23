function verifPass(ch){
    i = 0
    FF = false
    Maj = false
    Min = false
    Num = false
    while ((i<ch.length)&&(!FF)){
        if((ch.charAt(i)>="A")&&(ch.charAt(i)<="Z")){
            Maj=true
        }
        if((ch.charAt(i)>="a")&&(ch.charAt(i)<="z")){
            Min=true
        }
        if((ch.charAt(i)>="0")&&(ch.charAt(i)<="9")){
            Num=true
        }
        if(Maj&&Min&&Num){
            FF=true
        }
        i++;
    }
    return FF
}
function alpha(ch){
    i = 0;
    while ((i<ch.length-1)&&((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"))){
        i++;
    }
    return ((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"))
}
function verifMail(m){
    if(m.length>50){
        return false;
    }
    if(m.length<6){
        return false;
    }
    if(m.indexOf('@')==-1){
        return false
    }
    if(m.indexOf('.')==-1){
        return false
    }
    ch1 = m.substring(0, m.indexOf("@"));
    ch2 = m.substring(m.indexOf("@")+1, m.indexOf("."));
    ch3 = m.substring(m.indexOf(".")+1);
    if((!alpha(ch1))||(!alpha(ch2))||(!alpha(ch3))){
        return false
    }
    if((ch1.length<3)||(ch2.length<3)||(ch3.length<2)||(ch3.length>4)){
        return false
    }
    return true
}
function verif(){
    m = document.getElementById("m").value;
    mdp = document.getElementById("mdp").value;
    g = document.getElementById("sl").value;
    q1_1 = document.getElementById("q1_1").checked;
    q1_2 = document.getElementById("q1_2").checked;
    q1_3 = document.getElementById("q1_3").checked;
    q2_1 = document.getElementById("q2_1").checked;
    q2_2 = document.getElementById("q2_2").checked;
    q2_3 = document.getElementById("q2_3").checked;
    q3_1 = document.getElementById("q3_1").checked;
    q3_2 = document.getElementById("q3_2").checked;
    q3_3 = document.getElementById("q3_3").checked;
    if(!verifMail(m)){
        alert('verif mail !')
        return false;
    }
    if(mdp.length!=6||!verifPass(mdp)){
        alert('verif pass')
        return false;
    }
    if(g==-1){
        alert('select genre obligatoir')
        return false
    }
    if(q1_1==false&&q1_2==false&&q1_3==false){
        alert('choisir question 1')
        return false
    }
    if(q2_1==false&&q2_2==false&&q2_3==false){
        alert('choisir question 2')
        return false
    }
    if(q3_1==false&&q3_2==false&&q3_3==false){
        alert('choisir question 3')
        return false
    }
    return true
}