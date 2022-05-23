function GenererCaptcha(){
    
    ch = ""
    for (i=1; i<=10; i++){
        K = Math.round(Math.random() * (26-1)+1)
        if(K%2==0){
            ch+= String.fromCharCode(64+K)
        }else{
            ch+= String.fromCharCode(96+K)
        }
    }document.getElementById("cq").value=ch;
}

function verif(){
    a1 = document.getElementById('a1').checked;
    a2 = document.getElementById('a2').checked;
    a3 = document.getElementById('a3').checked;
    r1 = document.getElementById('r1').checked;
    r2 = document.getElementById('r2').checked;
    r3 = document.getElementById('r3').checked;
    sl = document.getElementById("sl").value;
    capa = document.getElementById("cq").value;
    rep = document.getElementById("rp").value;
    if(sl==-1){
        alert('select obligatoir')
        return false
    }
    if(a1==false && a2==false && a3==false){
        alert('choisir acceuil')
        return false
    }
    if(r1==false && r2==false && r3==false){
        alert('choisir restauration')
        return false
    }
    if(capa!=rep){
        alert('check capatcha')
        return false
    }
    return true
}