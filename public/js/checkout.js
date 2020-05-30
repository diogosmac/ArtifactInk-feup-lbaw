//ITEMS 

let checkoutItemQty = document.querySelectorAll('ul#checkout-items-list li div span:first-child'); 
let checkoutItemPrice = document.querySelectorAll('ul#checkout-items-list li div span:nth-child(2)'); 
let totalPrice = 0; 
let totalQty = 0; 

for(let i = 0; i < checkoutItemPrice.length; i++ ){
    totalPrice += checkoutItemPrice[i].innerHTML.substr(0,checkoutItemPrice[i].innerHTML.length -1) * checkoutItemQty[i].innerHTML; 
    totalQty += checkoutItemQty[i].innerHTML * 1 ; 
}

document.querySelectorAll('ul#checkout-items-list li  strong')[0].innerHTML = totalPrice + " €"; 
document.querySelectorAll('div#checkout-list span.badge-pill')[0].innerHTML = totalQty; 

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
let credit = document.getElementById('credit'); 

if(credit != null)
    credit.addEventListener('click',payment_event_handler, false); 

if(paypal != null)
    paypal.addEventListener('click',payment_event_handler, false); 

function payment_event_handler(){
    if(!paypal.checked){
        document.querySelector(".payment-form").style.display = "inherit"   
        document.querySelector(".payment-form2").style.display = "none"   
    }
    else{
        document.querySelector(".payment-form").style.display = "none"  
        document.querySelector(".payment-form2").style.display = "inherit"    
    } 
}

let  new_payment_btn = document.querySelector('#new-payment-btn'); 
let  ret_payment_btn = document.querySelector('#return-payment-btn'); 
let  payment_selector = document.querySelector('#payment-selector'); 

if(new_payment_btn != null){
    
    new_payment_btn.addEventListener('click', ()=>{
        let payment_field = document.querySelector('#new-payment-form');
        payment_field.style.display='initial'
        new_payment_btn.style.display='none'; 
        payment_selector.style.display='none'
        document.querySelector(".payment-form").style.display = "inherit"   
        
    },false);
}

if(ret_payment_btn != null){
  ret_payment_btn.addEventListener('click', ()=>{
    let payment_field = document.querySelector('#new-payment-form');
    payment_field.style.display='none'
    document.querySelector(".payment-form").style.display = "none"
    document.querySelector(".payment-form2").style.display = "none"    
    new_payment_btn.style.display='initial'; 
    payment_selector.style.display='flex'
    },false);  
}