function initial() {
    document.getElementById("explainshow1").style.display = "none";
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "none";
}

/*開啟遊戲說明1*/
function open_explain() {
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow1").style.display = "";
    document.getElementById("startpage").style.display = "none"
}

/*關閉遊戲說明*/
function close_explain() {
    document.getElementById("explainshow1").style.display = "none";
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "none";
    document.getElementById("startpage").style.display = "";
}

/*開啟遊戲說明2*/
function nextpage2() {
    document.getElementById("explainshow3").style.display = "none";
    document.getElementById("explainshow2").style.display = "";
    document.getElementById("explainshow1").style.display = "none";
}

/*開啟遊戲說明3*/
function nextpage3() {
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "";
}

window.addEventListener("load", initial, false);