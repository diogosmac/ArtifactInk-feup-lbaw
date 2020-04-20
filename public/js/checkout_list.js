let items = document.querySelectorAll('.checkout-table .checkout-item-list'); 

let total = document.querySelector('span.total-price')

for(let i =0; i< items.length; i++){

    let add_button = items[i].getElementsByClassName('add-button')[0]
    let sub_button = items[i].getElementsByClassName('sub-button')[0]
    let rmv_button = items[i].getElementsByClassName('rmv-button')[0]  
    let item_quant = items[i].getElementsByClassName('item-quant')[0]  
    let price = items[i].getElementsByClassName('item-price')[0].innerHTML
    let value = items[i].getElementsByClassName('item-value')[0]

    //action buttons 
    /*add_button.addEventListener('click',()=>{
        let old_val =  item_quant.innerHTML; 
        item_quant.innerHTML = parseInt(old_val) + 1

        //update item quant 
        value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'
        update_total_price();
    },false)

    sub_button.addEventListener('click',()=>{
        let old_val = item_quant.innerHTML;
        if(old_val>0) 
            item_quant.innerHTML = parseInt(old_val) - 1    
        
        //update item quant 
        value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'
        update_total_price();
    },false)

    //remove button 

    rmv_button.addEventListener('click',()=>{
        items[i].innerHTML = " "
        update_total_price();
    },false)*/

    //update item quant 
    value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'

}

update_total_price();

function update_total_price(){ 
    let sum=0; 
    for(let i=0; i< items.length; i++){
        if(items[i].getElementsByClassName('item-value')[0] !== undefined){
            let value = items[i].getElementsByClassName('item-value')[0].innerHTML
            sum = (parseFloat(sum)+ parseFloat(value)).toFixed(2)
        }
    }

    total.innerHTML=sum + "€"

}

function update_items(){
    console.log('updated')
    items = document.querySelectorAll('.checkout-table .checkout-item-list'); 
}


// MOBILE //

let items_mobile = document.querySelectorAll('.mobile-checkout-box .li-item'); 
let total_mobile = document.querySelector('.mobile-checkout-box .total .total-price');

console.log(total_mobile.innerHTML);
console.log(items_mobile);


for(let i =0; i< items_mobile.length; i++){

    let add_button = items_mobile[i].getElementsByClassName('add-button')[0]
    let sub_button = items_mobile[i].getElementsByClassName('sub-button')[0]
    let rmv_button = items_mobile[i].getElementsByClassName('rmv-button')[0]  
    let item_quant = items_mobile[i].getElementsByClassName('item-quant')[0]  
    let price = items_mobile[i].getElementsByClassName('item-price')[0].innerHTML
    let value = items_mobile[i].getElementsByClassName('item-value')[0]

    //action buttons 
    add_button.addEventListener('click',()=>{
        let old_val =  item_quant.innerHTML; 
        item_quant.innerHTML = parseInt(old_val) + 1

        //update item quant 
        value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'
        update_total_price_mobile();
    },false)

    sub_button.addEventListener('click',()=>{
        let old_val = item_quant.innerHTML;
        if(old_val>0) 
            item_quant.innerHTML = parseInt(old_val) - 1    
        
        //update item quant 
        value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'
        update_total_price_mobile();
    },false)

    //remove button 

    rmv_button.addEventListener('click',()=>{
        items_mobile[i].innerHTML = " "
        update_total_price_mobile();
        items_mobile[i].remove();
    },false)

    //update item quant 
    value.innerHTML = (parseFloat(price)*parseFloat(item_quant.innerHTML)).toFixed(2) +'€'

}

update_total_price_mobile();

function update_total_price_mobile(){ 
    let sum=0; 
    for(let i=0; i< items_mobile.length; i++){
        if(items_mobile[i].getElementsByClassName('item-value')[0] !== undefined){
            let value = items_mobile[i].getElementsByClassName('item-value')[0].innerHTML
            sum = (parseFloat(sum)+ parseFloat(value)).toFixed(2)
        }
    }

    total_mobile.innerHTML=sum + "€"

}

function update_items_mobile(){
    console.log('updated')
    items_mobile = document.querySelectorAll('.checkout-table .checkout-item-list'); 
}