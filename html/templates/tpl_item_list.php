<?php 

function draw_checkout_list(){ ?>

<?php } 

function draw_cart_list(){ ?>
<div class="container">
    <div class="row">
    <h4 class="shopping-cart-h">My Shopping Cart</h4>
    </div>
    <div class="checkout-box">
        <div class="row shopping-cart-div">
            <table class="table table-hover checkout-table">
                <thead>
                  <tr>
                      <th scope="col"></th>
                      <th scope="col">Products</th>
                      <th scope="col">Price un.</th>
                      <th scope="col">Quant.</th>
                      <th scope="col"></th>
                      <th scope="col">Value</th>
                  </tr>
                </thead>
                <tbody>
                <?php draw_checkout_table_item();
                    draw_checkout_table_item();
                    draw_checkout_table_item();
                    draw_checkout_table_item();
                    draw_checkout_table_item();
                ?>
                <tr class="total">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> <span class="total">Total: </span> <span class="total-price"> </span></th>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="row checkout-menu d-flex justify-content-between buttons ">
            <div>
                 <button class="btn return-btn">Keep Shopping</button>
            </div>
            <div>
                <a class="btn checkout-btn" href="../pages/checkout.php?p=1">Checkout</a>
            </div>
        </div>
    </div>
</div>
<?php }
function draw_checkout_table_item(){ ?>
     <tr class="checkout-item-list">
        <td scope="row">
            <a href="item-page">
                <img src="https://amotatuagem.com/wp-content/uploads/2018/06/Unalome-Tattoo-10.jpg" alt="">
            </a>
        </td>
        <th colspan="0">
            <a href="item-page">
                Larry the Bird
            </a>
        </th>
        <td colspan="0" class="item-price">89.90€</td>
        <td colspan="0">
            <button type="button" class="btn btn-primary sub-button">
                <i class="fas fa-minus"></i>
            </button>   
            <span class="item-quant"> 1</span>
            <button type="button" class="btn btn-primary add-button">
                <i class="fas fa-plus"></i>
            </button>   
        </td>
        <td colspan="0">
            <button type="button" class="btn btn-primary rmv-button">
                <i class="fas fa-trash-alt"></i>
            </button>   
        </td>
        <th colspan="0" class="item-value"></td>
    </tr>
<?php }
?>