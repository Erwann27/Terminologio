var xhr = createXhrObject();
if (!xhr) {
    window.alert("Objet XMLHTTPRequest non pris en charge par votre navigateur");
}

function update() {
    xhr.onreadystatechange = updateData;
    var category = document.getElementById("category-selection");
    var value = category.options[category.selectedIndex].text;
    var url = "Controller/projects.php?category=" + value;
    xhr.open("GET", url, true);
    xhr.send(null);
}

function updateData() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            var result = xhr.responseText;
            document.getElementById("project-selection").innerHTML = result;
        }
    }

}