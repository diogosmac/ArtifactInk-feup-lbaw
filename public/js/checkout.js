//ITEMS 

let checkoutItemQty = document.querySelectorAll('ul#checkout-items-list li div span:first-child'); 
let checkoutItemPrice = document.querySelectorAll('ul#checkout-items-list li div span:nth-child(2)'); 
let totalPrice = 0; 

for(let i = 0; i < checkoutItemPrice.length; i++ ){
    totalPrice += checkoutItemPrice[i].innerHTML.substr(0,checkoutItemPrice[i].innerHTML.length -1) * checkoutItemQty[i].innerHTML; 
}

document.querySelectorAll('ul#checkout-items-list li  strong')[0].innerHTML = totalPrice + " €"; 

//ADDRESS 

let  new_addr_btn = document.querySelector('#new_addr_btn'); 
let  ret_addr_btn = document.querySelector('#return_addr_btn'); 
let  addr_selector = document.querySelector('#addr-selector'); 

if(new_addr_btn != null){
    
    new_addr_btn.addEventListener('click', ()=>{
        let addr_field = document.querySelector('#new-addr-form');
        addr_field.style.display='initial'
        new_addr_btn.style.display='none'; 
        addr_selector.style.display='none'
        
    },false);
}

if(ret_addr_btn != null){
  ret_addr_btn.addEventListener('click', ()=>{
    let addr_field = document.querySelector('#new-addr-form');
    addr_field.style.display='none'
    new_addr_btn.style.display='initial'; 
    addr_selector.style.display='flex'
    },false);  
}

//PAYMENT METHOD 
let paypal = document.getElementById('paypal'); 
let credit= document.getElementById('credit'); 
let debit= document.getElementById('debit'); 

if(credit != null)
    credit.addEventListener('click',payment_event_handler, false); 

if(debit != null)
    debit.addEventListener('click',payment_event_handler, false); 

if(paypal != null)
    paypal.addEventListener('click',payment_event_handler, false); 

function payment_event_handler(){
    if(!paypal.checked)
        document.querySelector(".payment-form").style.display = "inherit"   
    else 
        document.querySelector(".payment-form").style.display = "none"   
}
