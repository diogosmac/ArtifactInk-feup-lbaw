/**
 * Add item to wishlist 
 */

// Product Page
let add_wishlist_buttons = document.querySelectorAll('button.li-wishlist');

for (let i = 0; i < add_wishlist_buttons.length; i++) {
    add_wishlist_buttons[i].addEventListener('click', (event) => {
        let id = add_wishlist_buttons[i].getAttribute('data-id');
        if (id == 'archived')
            return;
        sendAjaxRequest('post', '/profile/wishlist', {id_item: id}, addToWishlistHandler);
        event.preventDefault();
    }, false)
}

// Cards
//let cards_wishlist_buttons = document.querySelectorAll('');

function addToWishlistHandler() {
    document.querySelector('html').appendChild(wishlist_succ_msg); 
}

/**
 * Remove item from wishlist
 */

let delete_wishlist_buttons = document.querySelectorAll('button.remove-wishlist');

for (let i = 0; i < delete_wishlist_buttons.length; i++) {
    delete_wishlist_buttons[i].addEventListener('click', (event) => {
        let id = delete_wishlist_buttons[i].getAttribute('data-id');
        
        sendAjaxRequest('delete', '/profile/wishlist', {id_item: id}, removeFromWishlistHandler);
        event.preventDefault();
    }, false)
}

function removeFromWishlistHandler() {
    if (this.status != 200) {
        return;
    }

    let info = JSON.parse(this.responseText); 
    let id = info.id_item;

    let item = document.querySelector('li.wishlist-item[data-id="' + id + '"]');
    item.remove();
}

//success
let wishlist_succ_msg = document.createElement('div'); 
wishlist_succ_msg.setAttribute('role','alert'); 
wishlist_succ_msg.setAttribute('style','max-width: 40em;'); 
wishlist_succ_msg.setAttribute('class','alert');
wishlist_succ_msg.classList.add('alert-success'); 
wishlist_succ_msg.classList.add('alert-dismissible'); 
wishlist_succ_msg.classList.add('fade'); 
wishlist_succ_msg.classList.add('show'); 
wishlist_succ_msg.classList.add('fixed-top'); 
wishlist_succ_msg.classList.add('mx-auto'); 
wishlist_succ_msg.innerHTML = ` 
    <p>Product successfully added to your wishlist</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>`
    
//error 
/* IF TO UUSE CHANGE ITS NAME 
let error_msg = document.createElement('div'); 
error_msg.setAttribute('role','alert'); 
error_msg.setAttribute('style','max-width: 40em;'); 
error_msg.setAttribute('class','alert');
error_msg.classList.add('alert-danger'); 
error_msg.classList.add('alert-dismissible'); 
error_msg.classList.add('fade'); 
error_msg.classList.add('show'); 
error_msg.classList.add('fixed-top'); 
error_msg.classList.add('mx-auto'); 

error_msg.innerHTML = `  <p>Failed Adding item to your wishlist</p>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>`

*/