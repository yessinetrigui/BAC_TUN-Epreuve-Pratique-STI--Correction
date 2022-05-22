function alpha(ch){
    i=0
    while((i<ch.length-1) && ((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"))){
        i++;
    }
    return ((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"));
}
function checkMat(m){
    if(m.length!=4){
        return false;
    }
    if(!alpha(m.substring(0,2))){
        return false
    }
    if(isNaN(m.substring(2,4))){
        return false
    }
    return true;
}
function verifMail(e){
    if(e.indexOf("@")==-1){
        return false
    }
    if(e.indexOf(".")==-1){
        return false
    }
    if(e.length <= 5){
        return false
    }
    ch1 = e.substring(0,e.indexOf("@"));
    ch2 = e.substring(e.indexOf("@")+1, e.indexOf("."));
    ch3 = e.substring(e.indexOf(".")+1);
    if(!alpha(ch1)){
        return false
    }
    if(!alpha(ch2)){
        return false
    }
    if(!alpha(ch3)){
        return false
    }
    return true;
}
function verif(){
    mat = document.getElementById('m').value;
    n = document.getElementById('n').value;
    p = document.getElementById('p').value;
    e = document.getElementById('e').value;
    h = document.getElementById('h').checked;
    f = document.getElementById('f').checked;
    if(!checkMat(mat)){
        alert('verif mAt')
        return false
    }if((n.length==0)||(!alpha(n))){
        alert('verif name')
        return false
    }if((p.length==0)||(!alpha(p))){
        alert('verif prenom')
        return false
    }if((e.length==0)||(!verifMail(e))){
        alert('verif mail')
        return false
    }if(!h && !f){
        alert('verif genrre')
        return false;
    }
    return true
}