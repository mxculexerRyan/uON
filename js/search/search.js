const searchform = document.getElementById("search-form"),
searchbar = document.getElementById("searchbar"),
searchbtn = document.getElementById("searchbtn"),
search_Btn = document.getElementById("search-Btn");
var search_list = document.querySelector(".group-list");

searchbtn.onclick = ()=>{
    if(searchform.classList.contains("search-form-active")){
        searchform.classList.remove("search-form-active");
    }else{
        searchform.classList.add("search-form-active");
    }
    console.log(searchform);
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
                    search_list.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm);
}