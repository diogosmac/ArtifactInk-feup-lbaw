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
let normalArchiveButton;
function addArchiveListeners() {
    if (document.getElementsByClassName('archive-button').length == 0)
        return;
    normalArchiveButton = document.getElementsByClassName('archive-button')[0].cloneNode(true);
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
    if (this.status != 200) {
        return;
    }
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.archive-button[product-id="' + info.id_item + '"]');
    // replace button
    replaceButton = normalArchiveButton.cloneNode(true);
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
    if (this.status != 200) {
        return;
    }
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.unarchive-button[product-id="' + info.id_item + '"]');
    // replace button
    replaceButton = normalArchiveButton.cloneNode(true);
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
 * BAN/UNBAN USERS
 * 
 */
let normalBanButton;
function addBanListeners() {
    if (document.getElementsByClassName('ban-button').length == 0)
        return;
    normalBanButton = document.getElementsByClassName('ban-button')[0].cloneNode(true);
    let userRows = document.getElementsByClassName('user-row');
    for (let i = 0; i < userRows.length; i++) {
        let banButton = userRows[i].getElementsByClassName('ban-button')[0];
        let unbanButton = userRows[i].getElementsByClassName('unban-button')[0];

        if (banButton != null)
            banButton.addEventListener('click', (event) => {
                let userID = userRows[i].getAttribute('user-id');
                sendAjaxRequest('put', '/admin/users/ban', { id_user: userID }, banUserHandler);
                event.preventDefault();
            })

        if (unbanButton != null)
            unbanButton.addEventListener('click', (event) => {
                let userID = userRows[i].getAttribute('user-id');
                sendAjaxRequest('put', '/admin/users/unban', { id_user: userID }, unbanUserHandler);
                event.preventDefault();
            })
    };

}

function banUserHandler() {
    debugger;
    if (this.status != 200) {
        return;
    }
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.ban-button[user-id="' + info.id_user + '"]');
    // replace button
    replaceButton = normalBanButton.cloneNode(true);
    button.parentNode.replaceChild(replaceButton, button);
    // set new button properties
    replaceButton.setAttribute('user-id', info.id_user.toString())
    replaceButton.innerHTML = "Unban";
    replaceButton.classList.remove('ban-button');
    replaceButton.classList.add('unban-button');
    replaceButton.addEventListener('click', (event) => {
        sendAjaxRequest('put', '/admin/users/unban', { id_user: info.id_user }, unbanUserHandler);
        event.preventDefault();
    });
}

function unbanUserHandler() {
    debugger;
    if (this.status != 200) {
        return;
    }
    let info = JSON.parse(this.responseText);
    let button = document.querySelector('.unban-button[user-id="' + info.id_user + '"]');
    // replace button
    replaceButton = normalBanButton.cloneNode(true);
    button.parentNode.replaceChild(replaceButton, button);
    // set new button properties
    replaceButton.setAttribute('user-id', info.id_user.toString())
    replaceButton.innerHTML = "Ban";
    replaceButton.classList.remove('unban-button');
    replaceButton.classList.add('ban-button');
    replaceButton.addEventListener('click', (event) => {
        sendAjaxRequest('put', '/admin/users/ban', { id_user: info.id_user }, banUserHandler);
        event.preventDefault();
    });
}

/**
 * 
 * SALE ITEMS
 * 
 */
function addSaleItemsForm() {
    let submitButton = document.getElementById('submit-sale-button');
    let saleForm = document.getElementById('edit-sale');
    if (submitButton == null || saleForm == null)
        return;
    
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
    addBanListeners();
    addSaleItemsForm();
    if (document.getElementById("generalInfo") != null)
        generalInfo = document.getElementById("generalInfo").innerHTML;
});
