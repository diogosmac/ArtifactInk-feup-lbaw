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


let items = document.querySelectorAll('.checkout-table .checkout-item-list');

let total = document.querySelector('span.total-price')
for (let i = 0; i < items.length; i++) {

    let add_button = items[i].getElementsByClassName('add-button')[0]
    let sub_button = items[i].getElementsByClassName('sub-button')[0]
    let rmv_button = items[i].getElementsByClassName('rmv-button')[0]
    let item_quant = items[i].getElementsByClassName('item-quant')[0]
    let price = items[i].getElementsByClassName('item-price')[0].innerHTML
    let value = items[i].getElementsByClassName('item-value')[0]

    //action buttons 
    add_button.addEventListener('click', () => {
        let id = items[i].getAttribute('data-id');
        let old_quantity = item_quant.innerHTML;
        let quantity = parseInt(old_quantity) + 1;

        sendAjaxRequest('put', '/cart', {id_item: id, quantity: quantity}, addQuantityHandler.bind(null, id, quantity)); // bind attributes
    }, false)

    sub_button.addEventListener('click', () => {
        let id = items[i].getAttribute('data-id');
        let old_quantity = item_quant.innerHTML;
        let quantity = parseInt(old_quantity) - 1;

        if (quantity > 0)
            sendAjaxRequest('put', '/cart', {id_item: id, quantity: quantity}, subtractQuantityHandler.bind(null, id, quantity)); // bind attributes
    }, false)

    //remove button 
    rmv_button.addEventListener('click', () => {
        let id = items[i].getAttribute('data-id');
        sendAjaxRequest('delete', '/cart', {id_item: id}, removeItemHandler.bind(null, id)); // bind attributes
    }, false)

    //update item quant 
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';

}

function addQuantityHandler(id, quantity) {
    // if this.status == 200 
    
    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    let item_quant = item.getElementsByClassName('item-quant')[0];
    //update item quant
    item_quant.innerHTML = parseInt(quantity);
    
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';
    update_total_price();
}


function subtractQuantityHandler(id, quantity) {
    // if this.status == 200 
    
    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    let item_quant = item.getElementsByClassName('item-quant')[0];

    //update item quant
    item_quant.innerHTML = parseInt(quantity);
    
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';
    update_total_price();
}

function removeItemHandler(id) {
    // if this.status == 200
    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    item.remove();
    update_total_price();
}