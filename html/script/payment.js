let paypal = document.getElementById('paypal'); 
let credit= document.getElementById('credit'); 
let debit= document.getElementById('debit'); 

console.log(paypal.checked); 

credit.addEventListener('click',payment_event_handler, false); 
debit.addEventListener('click',payment_event_handler, false); 
paypal.addEventListener('click',payment_event_handler, false); 

function payment_event_handler(){
    if(!paypal.checked)
        document.querySelector(".payment-form").style.display = "inherit"   
    else 
        document.querySelector(".payment-form").style.display = "none"   
}
