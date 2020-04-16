let generalInfo;

function editGeneralInfo() {
    let infoArea = document.getElementById("generalInfo");
    // make it editable
    infoArea.setAttribute("contenteditable", "true");
    // wrap it around a border and add button to save changes
    infoArea.style.border = "1px solid #999";
    infoArea.style.borderRadius = "6px";
    infoArea.classList.add("p-1");

    let submitButtons = document.getElementById("infoSubmitButtons");
    submitButtons.classList.replace("info-submit-buttons", "d-flex");

}

function saveGeneralInfo() {
    let infoArea = document.getElementById("generalInfo");
    // make it uneditable
    infoArea.setAttribute("contenteditable", "false");
    // remove border and remove button
    infoArea.style.border = "";
    infoArea.classList.remove("p-3");


    let submitButtons = document.getElementById("infoSubmitButtons");
    submitButtons.classList.replace("d-flex", "info-submit-buttons");
    submitButtons.style.display = "none !important";

    generalInfo = infoArea.innerHTML;
}

function cancelGeneralInfo() {
    let infoArea = document.getElementById("generalInfo");
    // make it uneditable
    infoArea.setAttribute("contenteditable", "false");
    // remove border, remove button and reset info
    infoArea.style.border = "";
    infoArea.classList.remove("p-3");

    let submitButtons = document.getElementById("infoSubmitButtons");
    submitButtons.classList.replace("d-flex", "info-submit-buttons");
    submitButtons.style.display = "none !important";

    if (generalInfo != undefined)
        infoArea.innerHTML = generalInfo;
}

window.onload = function () {
    generalInfo = document.getElementById("generalInfo").innerHTML;
}

/**
 * file upload -> https://bootsnipp.com/snippets/D7MvX
 */
