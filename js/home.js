function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){  
            document.getElementById("chat").innerHTML =
            this.responseText;
        }
    };
    xhttp.open("GET", "chat.php", true);
    xhttp.send();
}