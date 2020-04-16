let classes = document.querySelectorAll('.secondary-nav-link')
let subclasses = document.querySelectorAll('.subclass-nav-mobile')

for(let i =0; i<classes.length; i++){
    for(let j = 0; j<subclasses.length; j++)
        subclasses[j].style.display = 'none'

    classes[i].addEventListener('click',()=>{
        
        if( subclasses[i].style.display == 'inline'){
            subclasses[i].style.display = 'none'
            return; 
        }

        for(let j = 0; j<subclasses.length; j++)
            subclasses[j].style.display = 'none'
    
       
        if(subclasses[i].style.display == 'none')
            subclasses[i].style.display = 'inline'
        
    },false)
}

let toggler = document.querySelectorAll('.navbar-toggler-mobile')

toggler[0].addEventListener('click', ()=>{
    for(let i= 0; i<subclasses.length; i++)
    subclasses[i].style.display = 'none'
}, false)