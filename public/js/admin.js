function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();

    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('load', handler);
    request.send(encodeForAjax(data));
}

/**
 * 
 * ARCHIVE/UNARCHIVE ITEMS
 * 
 */
let normalButton;
function addArchiveListeners() {
    normalButton = document.getElementsByClassName('archive-button')[0].cloneNode(true);
    let productRows = document.getElementsByClassName('product-row');
    for (let i = 0; i < productRows.length; i++) {
        let archiveButton = productRows[i].getElementsByClassName('archive-button')[0];
        let unarchiveButton = productRows[i].getElementsByClassName('unarchive-button')[0];

        if (archiveButton != null)
            archiveButton.addEventListener('click', (event) => {
                let productID = productRows[i].getAttribute('product-id');
                sendAjaxRequest('put', '/admin/products/archive', { id_item: productID }, archiveItemHandler);
                event.preventDefault();
            })

        if (unarchiveButton != null)
            unarchiveButton.addEventListener('click', (event) => {
                let productID = productRows[i].getAttribute('product-id');
                sendAjaxRequest('put', '/admin/products/unarchive', { id_item: productID }, unarchiveItemHandler);
                event.preventDefault();
            })
    };

}

function archiveItemHandler() {
    debugger;
    if (this.status != 200) {
        return;
    }
    debugger;
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.archive-button[product-id="' + info.id_item + '"]');
    // replace button
    replaceButton = normalButton.cloneNode(true);
    button.parentNode.replaceChild(replaceButton, button);
    // set new button properties
    replaceButton.setAttribute('product-id', info.id_item.toString())
    replaceButton.innerHTML = "Unarchive";
    replaceButton.classList.remove('archive-button');
    replaceButton.classList.add('unarchive-button');
    replaceButton.addEventListener('click', (event) => {
        sendAjaxRequest('put', '/admin/products/unarchive', { id_item: info.id_item }, unarchiveItemHandler);
        event.preventDefault();
    });
}

function unarchiveItemHandler() {
    debugger;
    if (this.status != 200) {
        return;
    }
    debugger;
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.unarchive-button[product-id="' + info.id_item + '"]');
    // replace button
    replaceButton = normalButton.cloneNode(true);
    button.parentNode.replaceChild(replaceButton, button);
    // set new button properties
    replaceButton.setAttribute('product-id', info.id_item.toString())
    replaceButton.innerHTML = "Archive";
    replaceButton.classList.remove('unarchive-button');
    replaceButton.classList.add('archive-button');
    replaceButton.addEventListener('click', (event) => {
        sendAjaxRequest('put', '/admin/products/archive', { id_item: info.id_item }, archiveItemHandler);
        event.preventDefault();
    });
}

/**
 * 
 * GENERAL INFO
 * 
 */
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

// perform actions when window loads
window.addEventListener('load', function () {
    addArchiveListeners();
    if (document.getElementById("generalInfo") != null)
        generalInfo = document.getElementById("generalInfo").innerHTML;
});
