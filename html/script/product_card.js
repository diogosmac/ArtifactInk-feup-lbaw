let card = document.querySelectorAll('.product-card');

for(let i =0; i< card.length; i++){
    card[i].addEventListener('mouseover',function(e){
        console.log(card[i].getElementsByTagName('a')[0].style);
        card[i].getElementsByTagName('a')[0].style.display = 'initial'
        card[i].getElementsByTagName('a')[1].style.display = 'initial'
        card[i].getElementsByTagName('i')[0].style.display = 'initial'
        card[i].getElementsByTagName('i')[1].style.display = 'initial'
  
    },false); 

    card[i].addEventListener('mouseleave',function(e){
        card[i].getElementsByTagName('a')[0].style.display = 'none'
        card[i].getElementsByTagName('a')[1].style.display = 'none'
  
    },false); 
}
