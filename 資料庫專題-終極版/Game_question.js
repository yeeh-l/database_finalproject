function initial() {
    document.getElementById("question").style.display="none";
    document.getElementById("notebook").style.display="";
}

function intro(){
    document.getElementById("intro").style.display="";
}

function Question(){
    document.getElementById("question").style.display="";
    document.getElementById("intro").style.display="none";
}

window.addEventListener("load", initial, false);