function verif(){
    ne = document.getElementById("ne").value;
    dc = document.getElementById("dc").value;
    ds = document.getElementById("ds").value;
    sl = document.getElementById("sl").value;
    if(ne.substring(0,3)!="4SI"){
        alert("verif numero eleve")
        return false
    }
    npart = ne.substring(3);
    if(isNaN(npart)||npart.indexOf(" ")!=-1){
        alert("verif numero eleve")

        return false
    }else if(npart<=0){
        alert("verif numero eleve")
        return false;
    }
    if(sl==-1){
        alert('verif select')
        return false;
    }
    if(isNaN(dc)||dc.indexOf(" ")!=-1||dc.length==0){
        alert("verif dc")
        return false
    }else if(dc<0 || dc>20){
        alert("verif dc")

        return false;
    }
    if(isNaN(ds)||dc.indexOf(" ")!=-1||ds.length==0){
        alert("verif ds")

        return false
    }else if(ds<0 || ds>20){
        alert("verif ds")

        return false;
    }
    return true;
}