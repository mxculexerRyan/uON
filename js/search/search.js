const searchform = document.getElementById("search-form"),
searchbar = document.getElementById("searchbar"),
searchbtn = document.getElementById("searchbtn"),
search_Btn = document.getElementById("search-Btn"),
search_list = document.querySelector(".search-list");
searchbtn.onclick = ()=>{
    if(searchform.classList.contains("search-form-active")){
        searchform.classList.remove("search-form-active");
    }else{
        searchform.classList.add("search-form-active");
    }
}

search_Btn.onclick = ()=>{
    searchbar.focus();
}

searchform.onsubmit = (e)=>{
    e.preventDefault();
}

searchbar.onkeyup = ()=>{
    let searchTerm = searchbar.value;
    if(searchTerm != ""){
        searchbar.classList.add("active");
    }
    else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/search/search.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(!searchbar.classList.contains("active")){
                        search_list.style.display = "none";
                        user_list.style.display = "block";
                    }else{
                        search_list.innerHTML = data;
                        search_list.style.display = "block";
                        user_list.style.display = "none";
                    }
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm);
}

    function loadsearch(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){  
                user_list.classList.add("active");
                group_list.classList.add("active");
                searchbar.classList.remove("active");
                search_list.style.display = "block";
                searchform.classList.remove("search-form-active");
                searchbar.value = "";
                document.getElementById("search").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "./chat/chat.php?q=" + id, true);
        xhttp.send();
        sendMsg();
    }
    
    function searchgrp(gid) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){  
                user_list.classList.add("active");
                group_list.classList.add("active");
                searchbar.classList.remove("active");
                search_list.style.display = "block";
                searchform.classList.remove("search-form-active");
                searchbar.value = "";
                document.getElementById("search").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "./chat/group_chat.php?q=" + gid, true);
        xhttp.send();
        sendGrpMsg();
    }