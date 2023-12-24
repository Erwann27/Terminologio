var xhrLanguages = createXhrObject();
if (!xhrLanguages) {
    window.alert("Objet XMLHTTPRequest non pris en charge par votre navigateur");
}

function printLanguagesFromProject() {
    xhrLanguages.onreadystatechange = updateLang;
    let category = document.getElementById("category-selection");
    let project = document.getElementById("project-selection");
    let value_cat = category.options[category.selectedIndex].text;
    let value_proj = project.options[project.selectedIndex].text;

    let url = "Controller/printLanguagesFromProject.php?title=" + value_proj + "&cat=" + value_cat;
    xhrLanguages.open("GET", url, false);
    xhrLanguages.send(null);
}

function updateLang() {
    if (xhrLanguages.readyState == 4) {
        if (xhrLanguages.status == 200) {
            let result = xhrLanguages.responseText;
            document.getElementById("language-selection").innerHTML = result;
        }
    }

}