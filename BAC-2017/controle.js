function alpha(ch){
    i=0;
    while ((i<ch.length-1)&&((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"))){
        i++;
    }
    return ((ch.charAt(i).toUpperCase()>="A")&&(ch.charAt(i).toUpperCase()<="Z"));
}
function verif(){
    c = document.getElementById('c').value;
    n = document.getElementById('n').value;
    p = document.getElementById('p').value;
    t = document.getElementById('t').value;
    sl = document.getElementById('sl').value;
    pp = document.getElementById('pp').value;
    if(isNaN(c)||c.length!=8||c.indexOf(" ")!=-1||((c[0]!=1)&&(c[0]!=0))){
        alert('verif cin')
        return false;
    }
    if((!alpha(n))||(n.length>30) || (n.length<3)){
        alert('verif nom')
        return false;
    }
    if((!alpha(p))||(p.length>30) || (p.length<3)){
        alert('verif prenom')
        return false;
    }
    if(isNaN(t)||t.length!=8||t.indexOf(" ")!=-1||(t[0]==0)){
        alert('verif tel')
        return false;
    }
    if(sl==-1){
        alert('select obligatoir ')
        return false;
    }
    if(isNaN(pp)||pp.length==0||pp.indexOf(" ")!=-1){
        alert('verif prix propose')
        return false;
    }else if(pp<=0){
        alert('verif prix propose')
        return false;
    }
    return true
}

function espaces(ch){
    while(ch.charAt(0)==" "){
        ch = ch.substring(1)
    }
    while(ch.charAt(ch.length-1)==" "){
        ch = ch.substring(0,ch.length-1)
    }
    ch2=""
    for (i=0; i<=ch.length-2;i++){
        if(ch.charAt(i)==" "&&ch.charAt(i+1)!=" "){
            ch2+=ch.charAt(i)
        }else if(ch.charAt(i)!=" "){
            ch2+=ch.charAt(i)
        }
    }
    ch = ch2[0].toUpperCase()+ch2.substring(1)+ch.substring(ch.length-1);
    console.log(ch)
}