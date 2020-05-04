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
