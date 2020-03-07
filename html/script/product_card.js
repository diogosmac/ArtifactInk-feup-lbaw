let card = document.querySelectorAll('.product-card');

for(let i =0; i< card.length; i++){
    console.log(card[i]);
    card[i].addEventListener('mouseover',function(e){
        card[i].getElementsByTagName('i')[0].style.display = 'contents'
        card[i].getElementsByTagName('i')[1].style.display = 'contents'
  
    },false); 

    card[i].addEventListener('mouseleave',function(e){
        card[i].getElementsByTagName('i')[0].style.display = 'none'
        card[i].getElementsByTagName('i')[1].style.display = 'none'
  
    },false); 
}
