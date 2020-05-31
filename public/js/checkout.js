//ITEMS 

let checkoutItemQty = document.querySelectorAll('ul#checkout-items-list li div span:first-child'); 
let checkoutItemPrice = document.querySelectorAll('ul#checkout-items-list li div span:nth-child(2)'); 
let totalPrice = 0; 
let totalQty = 0; 

for(let i = 0; i < checkoutItemPrice.length; i++ ){
    totalPrice += checkoutItemPrice[i].innerHTML.substr(0,checkoutItemPrice[i].innerHTML.length -1) * checkoutItemQty[i].innerHTML; 
    totalQty += checkoutItemQty[i].innerHTML * 1 ; 
}


//SHIPPING METHOD ADD TO CART

let standard_shipping_radio = document.getElementById('standard-shipping');
let express_shipping_radio = document.getElementById('express-shipping'); 

updateShipping(); 

standard_shipping_radio.addEventListener('click', updateShipping, false );
express_shipping_radio.addEventListener('click',updateShipping, false ); 

function updateShipping(){
   if(standard_shipping_radio.checked){
        document.querySelector('#shipping-cost').innerHTML = 1.99; 

        let shipping_price = document.getElementById('shipping-cost').innerHTML *1; 

        document.querySelectorAll('ul#checkout-items-list li  strong')[0].innerHTML = totalPrice +shipping_price + " €"; 
        
        document.getElementById('shipping-confirm').innerHTML = 'Standard Shipping - '+ 1.99 +'€'; 
        
    }else if(express_shipping_radio.checked){
        document.querySelector('#shipping-cost').innerHTML = 4.99; 

        let shipping_price = document.getElementById('shipping-cost').innerHTML *1; 

        document.querySelectorAll('ul#checkout-items-list li  strong')[0].innerHTML = totalPrice +shipping_price + " €"; 

        document.getElementById('shipping-confirm').innerHTML = 'Express Shipping - '+ 4.99 +'€'; 
    } 
}

let shipping_price = document.getElementById('shipping-cost').innerHTML *1; 

document.querySelectorAll('ul#checkout-items-list li  strong')[0].innerHTML = totalPrice +shipping_price + " €"; 
document.querySelectorAll('div#checkout-list span.badge-pill')[0].innerHTML = totalQty; 


//SHIPPING DATES 
let standardTime = new Date(); 
let expressTime = new Date(); 

standardTime.setDate(standardTime.getDate() + 3 );
expressTime.setDate(expressTime.getDate() + 5 );
//standard
let monthStandard = standardTime.getMonth() + 1
let dayStandard = standardTime.getDate();

//express
var monthExpress = expressTime.getMonth() + 1
var dayExpress = expressTime.getDate();




document.querySelector('#standard-date').innerHTML = 'Expected by '  + getMonth(monthStandard) +' '+ dayStandard; 
document.querySelector('#express-date').innerHTML = 'Expected by ' +  getMonth(monthExpress) +' '+ dayExpress; 
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

//FORM PAGES
let next_shipping = document.querySelector('#next-shipping'); 
let next_payment = document.querySelector('#next-payment'); 
let previous_payment = document.querySelector('#previous-payment'); 
let previous_confirm = document.querySelector('#previous-confirm'); 

next_shipping.addEventListener('click',showPayment, false); 
next_payment.addEventListener('click', showConfirm, false);
previous_payment.addEventListener('click',showShipping, false);  
previous_confirm.addEventListener('click',showPayment, false);  
 
let p2_shipping = document.querySelector('#p2-shipping'); 
let p3_shipping = document.querySelector('#p3-shipping'); 
let p1_payment = document.querySelector('#p1-payment');  
let p3_payment = document.querySelector('#p3-payment'); 
let p1_confirm = document.querySelector('#p1-confirm'); 
let p2_confirm = document.querySelector('#p2-confirm'); 

p2_shipping.addEventListener('click', showPayment, false); 
p3_shipping.addEventListener('click', showConfirm, false); 
p1_payment.addEventListener('click', showShipping, false); 
p3_payment.addEventListener('click', showConfirm, false); 
p1_confirm.addEventListener('click', showShipping, false); 
p2_confirm.addEventListener('click', showPayment, false); 

let shipping_form = document.querySelector("#checkout-shipping");
let payment_form = document.querySelector("#checkout-payment");
let confirm_form = document.querySelector("#checkout-confirm");


function showShipping(){
    shipping_form.style.display='initial'; 
    payment_form.style.display='none'; 
    confirm_form.style.display = 'none'; 
}

function showPayment(){
    shipping_form.style.display='none'; 
    payment_form.style.display='initial'; 
    confirm_form.style.display = 'none'; 
}

function showConfirm(){
    shipping_form.style.display='none'; 
    payment_form.style.display='none'; 
    confirm_form.style.display = 'initial'; 
    updateAddress(); 
    updatePayment(); 
}

//===== CONFIRM PAGES =====

//ADDRESS

//todo add evebt listeners for this stuff 
let addr1_confirm =  document.getElementById('addr1-confirm');
let addr2_confirm =  document.getElementById('addr2-confirm'); 
let addr_selected = document.getElementById('address-input-group'); 

updateAddress(); 

function updateAddress(){
    if( document.querySelector('#new-addr-form').style.display == "none" || document.querySelector('#new-addr-form').style.display === "" ){
        let str_addr = addr_selected.options[addr_selected.selectedIndex].innerHTML; 
        let str_addr_arr = str_addr.split(' -'); 
        addr1_confirm.innerHTML = str_addr_arr[3]; 
        addr2_confirm.innerHTML = str_addr_arr[0] + ' - ' + str_addr_arr[1] + ' - '+str_addr_arr[2];

    }else{

        addr1_confirm.innerHTML = document.getElementById('streetAdd').innerHTML; 
        //todo
        addr2_confirm.innerHTML = document.getElementById('cityAdd').innerHTML +" - "+document.getElementById('postalCodeAdd').innerHTML;
    }
}


//PAYMENT METHOD 
let payment1_confirm = document.getElementById('payment1-confirm');
let payment2_confirm = document.getElementById('payment2-confirm');
let payment_selected = document.getElementById('payment-input-group');

updatePayment(); 

function updatePayment(){
    
    if(document.querySelector('#new-payment-form').style.display == "none" || document.querySelector('#new-payment-form').style.display === ""){
        let str_payment = payment_selected.options[payment_selected.selectedIndex].innerHTML; 
        let str_payment_addr = str_payment.split(' '); 
        
        if(str_payment_addr.includes('Credit')){
            payment1_confirm.innerHTML = "Credit Card"; 
            payment2_confirm.innerHTML =str_payment; 
        }else{
            payment1_confirm.innerHTML = "Paypal"; 
            payment2_confirm.innerHTML = str_payment; 
        }
    
    }else{
    
    }
}


// ===== UTILITY FUNCTIONS ======
function getMonth(month){
    let  monthStr = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    return  monthStr[month-1]; 
}