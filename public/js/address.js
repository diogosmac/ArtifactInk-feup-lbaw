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
