function printCaptionText(editable) {
    let xhrText = createXhrObject();
    let category = document.getElementById("category-selection");
    let project = document.getElementById("project-selection");
    let language = document.getElementById("language-selection");
    language = language.options[language.selectedIndex].text;
    let value_cat = category.options[category.selectedIndex].text;
    let value_proj = project.options[project.selectedIndex].text;

    let url = "Controller/printCaptionText.php?title=" + value_proj + "&cat=" + value_cat + "&lang=" + language;
    xhrText.open("GET", url, false);
    xhrText.send(null);
    if (xhrText.status == 200) {
        let array = JSON.parse(xhrText.responseText);
        let field = document.getElementById("captions");
        field.innerHTML = "";
        let legend = document.createElement("legend");
        let legendText = document.createTextNode("Terminologies");
        legend.class = "w-auto";
        legend.appendChild(legendText);
        field.appendChild(legend);
        for (let i = 0; i < array.length; ++i) {
            let div = document.createElement("div");
            div.setAttribute("id", "captionDiv" + array[i].caption_id);
            let text = document.createElement("p");
            let nb = array[i].caption_id;
            let node = document.createTextNode(nb + " : ");
            text.appendChild(node);
            div.appendChild(text);
            text = document.createElement("p");
            let trad = array[i].text;
            node = document.createTextNode(" " + trad);
            let id = "Caption" + nb;
            let caption = document.getElementById(id);
            if (editable == '1') {
                text.setAttribute("contenteditable", "true");
                text.onblur = function () {
                    changeText(text.innerHTML, nb);
                    caption.setAttribute("font-weight", "");
                };

                text.onfocus = function () {
                    caption.setAttribute("font-weight", "900");
                }
            }
            text.appendChild(node);
            div.appendChild(text);
            let btn = document.createElement("btn");
            let btnText = document.createTextNode("Supprimer la légende")
            btn.appendChild(btnText);
            btn.classList.add("btn", "btn-danger");
            btn.setAttribute("onclick", "removeCaption("+ nb +")");
            div.appendChild(btn);
            field.append(div);
        }
    }
}

function removeCaption(id){
    let xhr = createXhrObject();
    let category = document.getElementById("category-selection");
    let project = document.getElementById("project-selection");
    let value_cat = category.options[category.selectedIndex].text;
    let value_proj = project.options[project.selectedIndex].text;
    let svg = document.getElementById("svg");
    let url = "../Controller/removeCaption.php?cat=" + value_cat + "&title=" + value_proj + "&cap_id=" + id;
    xhr.open("GET", url, false);
    xhr.send(null);
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let term = document.getElementById("captionDiv" + id);
            let field = document.getElementById("captions");
            field.removeChild(term);
            // let point = document.getElementById("Caption" + id);
            // svg.removeChild(point);
        }
    }
}