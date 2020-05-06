/**
 * Add item to wishlist 
 */

// Product Page
let wishlist_buttons = document.querySelectorAll('.li-wishlist');

for (let i = 0; i < wishlist_buttons.length; i++) {
    wishlist_buttons[i].addEventListener('click', (event) => {
        let id = wishlist_buttons[i].getAttribute('data-id');
        
        sendAjaxRequest('post', '/profile/wishlist', {id_item: id}, addToWishlistHandler);
        event.preventDefault();
    }, false)
}

// Cards
wishlist_buttons = document.querySelectorAll();

function addToWishlistHandler() {
    // Success alert
}

/**
 * Remove item from wishlist
 */

wishlist_buttons = document.querySelectorAll('button.remove-wishlist');

for (let i = 0; i < wishlist_buttons.length; i++) {
    wishlist_buttons[i].addEventListener('click', (event) => {
        let id = wishlist_buttons[i].getAttribute('data-id');
        
        sendAjaxRequest('delete', '/profile/wishlist', {id_item: id}, addToWishlistHandler);
        event.preventDefault();
    }, false)
}
