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
    add_button.addEventListener('click', (event) => {
        let id = items[i].getAttribute('data-id');
        let old_quantity = item_quant.innerHTML;
        let quantity = parseInt(old_quantity) + 1;

        sendAjaxRequest('put', '/cart', {id_item: id, quantity: quantity}, addQuantityHandler);
        event.preventDefault();
    }, false)

    sub_button.addEventListener('click', () => {
        let id = items[i].getAttribute('data-id');
        let old_quantity = item_quant.innerHTML;
        let quantity = parseInt(old_quantity) - 1;

        if (quantity > 0)
            sendAjaxRequest('put', '/cart', {id_item: id, quantity: quantity}, subtractQuantityHandler); 
    }, false)

    //remove button 
    rmv_button.addEventListener('click', () => {
        let id = items[i].getAttribute('data-id');
        sendAjaxRequest('delete', '/cart', {id_item: id}, removeItemHandler); // bind attributes
    }, false)

    //update item quant 
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';

}
update_total_price();


function addQuantityHandler() {
    if (this.status != 200) {
        return;
    }
    
    let info = JSON.parse(this.responseText); 
    let id = info.id_item;
    let quantity = info.quantity;

    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    let item_quant = item.getElementsByClassName('item-quant')[0];
    let value = item.getElementsByClassName('item-value')[0]
    let price = item.getElementsByClassName('item-price')[0].innerHTML

    //update item quant
    item_quant.innerHTML = parseInt(quantity);
    
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';
    update_total_price();
}


function subtractQuantityHandler() {
    if (this.status != 200) {
        return;
    }
    
    let info = JSON.parse(this.responseText); 
    let id = info.id_item;
    let quantity = info.quantity; 
    
    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    let item_quant = item.getElementsByClassName('item-quant')[0];
    let value = item.getElementsByClassName('item-value')[0]
    let price = item.getElementsByClassName('item-price')[0].innerHTML

    //update item quant
    item_quant.innerHTML = parseInt(quantity);
    
    value.innerHTML = (parseFloat(price) * parseFloat(item_quant.innerHTML)).toFixed(2) + '€';
    update_total_price();
}

function removeItemHandler() {
    if (this.status != 200) {
        return;
    }
    
    let info = JSON.parse(this.responseText); 
    let id = info.id_item;

    let item = document.querySelector('tr.checkout-item-list[data-id="' + id + '"]');
    item.remove();
    update_total_price();
}

function update_total_price(){ 
    if(total == null)
        return; 
        
    let newItems = document.querySelectorAll('.checkout-table .checkout-item-list');
    
    if (newItems.length == 0) {
        total.innerHTML= "0.00" + "€"
        return;
    }

    let sum=0; 
    for(let i=0; i< newItems.length; i++){
        if(newItems[i].getElementsByClassName('item-value')[0] !== undefined){
            let value = newItems[i].getElementsByClassName('item-value')[0].innerHTML
            sum = (parseFloat(sum)+ parseFloat(value)).toFixed(2)
        }
    }

    total.innerHTML=sum + "€"
}

//ADD TO CART 

let add_to_cart_button = document.querySelectorAll('.add-to-cart-btn');

//add butn click actions 
for(let i=0; i < add_to_cart_button.length; i++){
    let id_item = add_to_cart_button[i].getAttribute("data-product-type");
    if (id_item == 'archived')
        continue;
    add_to_cart_button[i].addEventListener('click',add_to_cart.bind(null,id_item), false);
}

function add_to_cart(id_item){

    let quantity = 1; 
    //let qty_selector = document.querySelector('#inputGroupSelect01').value; 
    if(document.getElementById('inputGroupSelect01') !== null)
        quantity = document.getElementById('inputGroupSelect01').value; 

    console.log('add to cart: '+id_item+ ' qty: '+quantity); 
    sendAjaxRequest('post', '/cart', {id_item: id_item,quantity: quantity}, add_to_cart_hadler);
}


function add_to_cart_hadler(){
    if (this.status != 200){
        document.querySelector('html').appendChild(error_msg);
    }
    else{
        let response = JSON.parse(this.responseText);
        
        let cart_list = document.querySelector('ul.list-cart'); 

        //create A
        let new_product = document.createElement('a'); 
        new_product.classList.add('item-link-cart'); 
        new_product.href = "/product/"+response.item.id;

        //create Li 
        let li = document.createElement('li'); 
        li.setAttribute('class', 'cart-item-list'); 
        li.className += ' list-group-item';
        li.className += ' d-flex';
        li.className += ' justify-content-between';
        li.className += ' align-items-center';

        //create span 
        let span = document.createElement('span'); 

        //create img 
        let img = document.createElement('img'); 
        img.setAttribute('class','cart-item-list-img'); 
        img.setAttribute('alt',response.item.name); 
        img.setAttribute('src','/storage/img_product/' + response.picture.link); 

       // img.alt = response.item.name; 
        //img.src = 'TODO'

        //create h5
        let h5 = document.createElement('h5'); 
        h5.setAttribute('class','cart-item-list-name')
        h5.innerHTML = response.item.name; 

        //create h6 price
        let h6_price = document.createElement('h6'); 
        h6_price.setAttribute('class','cart-item-list-price')
        h6_price.innerHTML = response.item.price; 

        //create h6 quantity 
        let h6_qty = document.createElement('h6'); 
        h6_qty.setAttribute('class','badge');
        h6_qty.className += ' badge-primary';
        h6_qty.className += ' badge-pill';
        h6_qty.className += ' cart-item-list-quant';
        h6_qty.innerHTML = response.item.pivot.quantity;

        span.appendChild(img); 
        li.appendChild(span);
        li.appendChild(h5); 
        li.appendChild(h6_price); 
        li.appendChild(h6_qty); 

        new_product.appendChild(li); 

        cart_list.appendChild(new_product);

        //update to total price
        if(document.getElementById('price-total').innerHTML === ""){
            document.getElementById('price-total').innerHTML = response.item.price + ' €';
            document.getElementById('total-label').innerHTML = "Total: "
        }else{
            let oldPrice = document.getElementById('price-total').innerHTML.substring(0,document.getElementById('price-total').innerHTML.length-1); 
            document.getElementById('price-total').innerHTML = oldPrice*1 + response.item.price *1 + ' €';
        }
      
        document.querySelector('html').appendChild(success_msg);
    }  
}

//cart list on navbar 

let priceNav = null;
let cartItemsNav = document.querySelectorAll('div.dropdown-cart div.panel-body ul.list-cart a li');
let listPriceNav =  document.querySelectorAll('div.dropdown-cart div.panel-body ul.list-cart a li .cart-item-list-price');
let listQtyNav =  document.querySelectorAll('div.dropdown-cart div.panel-body ul.list-cart a li .cart-item-list-quant'); 

for(let i = 0; i< cartItemsNav.length/2; i++ ){
    priceNav += listPriceNav[i].innerHTML * listQtyNav[i].innerHTML; 
}

if(priceNav !== null){
    document.querySelectorAll('div.dropdown-cart div.cart-list-total #price-total')[0].innerHTML = priceNav + " €"; 
}else{ 
    document.querySelectorAll('div.dropdown-cart div.cart-list-total #total-label')[0].innerHTML= "Cart is Empty";
}
   
//disable checkout if no cart 

if(document.querySelectorAll('#checkout-buttons-div a')[0] !== undefined){
    if(document.querySelectorAll('tr.checkout-item-list').length == 0 )
        document.querySelector('#checkout-buttons-div a').classList.add('disabled')
}
    

//success
let success_msg = document.createElement('div'); 
success_msg.setAttribute('role','alert'); 
success_msg.setAttribute('style','max-width: 40em;'); 
success_msg.setAttribute('class','alert');
success_msg.classList.add('alert-success'); 
success_msg.classList.add('alert-dismissible'); 
success_msg.classList.add('fade'); 
success_msg.classList.add('show'); 
success_msg.classList.add('fixed-top'); 
success_msg.classList.add('mx-auto'); 
success_msg.innerHTML = ` 
    <p>Product successfully added to your cart</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>`;
//error 
let error_msg = document.createElement('div'); 
error_msg.setAttribute('role','alert'); 
error_msg.setAttribute('style','max-width: 40em;'); 
error_msg.setAttribute('class','alert');
error_msg.classList.add('alert-danger'); 
error_msg.classList.add('alert-dismissible'); 
error_msg.classList.add('fade'); 
error_msg.classList.add('show'); 
error_msg.classList.add('fixed-top'); 
error_msg.classList.add('mx-auto'); 

error_msg.innerHTML = `  <p>Failed Adding item to cart</p>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>`
