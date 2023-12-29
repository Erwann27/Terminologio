var xhr = createXhrObject();
if (!xhr) {
    window.alert("Objet XMLHTTPRequest non pris en charge par votre navigateur");
}

function deleteUser(username){
    console.log(username);
    var url = "Controller/deleteUser.php?user=" + username;
    xhr.open("GET", url, false);
    xhr.send(null);

    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let node = document.getElementById("user" + username);
            document.getElementById("userList").removeChild(node);
        }
    }
}