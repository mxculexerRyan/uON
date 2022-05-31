
<div class="d-flex">
    <h4 class="text-info mr-auto">Messages</h4>
    <nav class="d-flex">
        <button class="btn btn-outline-info mx-1 my-1" id="edit"><i id="edit" class="fas fa-ellipsis text-info"></i></button>
        <button class="btn btn-outline-info mx-1 my-1" id="search-Btn"><i id="searchbtn" class="fas fa-search text-info"></i></button>
        <div class="action">
            <div class="profile">
                <button type="submit" class="btn btn-outline-info my-1" id="search-Btn"><i class="fab fa-buromobelexperte fa-lg text-info"></i></button>
            </div>
            <div class="menu">
                <h3>Someone Famous<br>
                    <span>Website Designer</span>
                </h3>
                <a href="#" class="nav-link"><i id="searchbtn" class="fas fa-user"> Search User</i></a>
                <a href="#" class="nav-link"><i id="searchbtn" class="fas fa-edit"> Edi</i></a>
                <a href="#" class="nav-link"><i id="searchbtn" class="fas fa-cogs"> Settings</i></a>
                <a href="#" class="nav-link"><i id="searchbtn" class="fas fa-search"> Search User</i></a>
            </div>
        </div>
        

    </nav>
</div>
<div>
    <form action="#" class="search-form" id="search-form" autocomplete="on">
        <div class="row my-2">
            <div class="col-10 mr-0 pr-0">
                <input type="text"  id="searchbar" name="message" class="form-control" placeholder="Your Text Here....">
            </div>
            <div class="col-2 ml-0">
                <button type="submit" class="btn btn-outline-info" id="search-Btn"><i class="fas fa-filter fa-lg"></i></button>
            </div>
        </div>
    </form>
</div>

<div>
    <div class="nav justify-content-between">
        <input type="button" value="Chats" class="btn btn-outline-info px-5 mb-2" onclick="loadchat()">
        <input type="button" value="groups" class="btn btn-outline-info px-5 mb-2" onclick="loadgrup()">
    </div>
    <div class="chat-list" id="chat"></div>
    <div class="group-list" id="group-chat"></div>
    <div class="search-list" id="search"></div>
</div>
<script src="../../../uON/js/users/users_list.js"></script>
<script src="../../../uON/js/search/search.js"></script>