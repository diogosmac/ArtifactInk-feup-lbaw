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
    // Success alert
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
