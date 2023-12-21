var xhr = createXhrObject();
if (!xhr) {
    window.alert("Objet XMLHTTPRequest non pris en charge par votre navigateur");
}

function printProject() {
    xhr.onreadystatechange = updateImg;
    let category = document.getElementById("category-selection");
    let project = document.getElementById("project-selection");
    let value_cat = category.options[category.selectedIndex].text;
    let value_proj = project.options[project.selectedIndex].text;

    let url = "Controller/print.php?title=" + value_proj + "&cat=" + value_cat;
    xhr.open("GET", url, true);
    xhr.send(null);
}

function updateImg() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let result = xhr.responseText;
            document.getElementById("show-img").innerHTML = result;
            printCaptions();
            printCaptionText();
        }
    }
}