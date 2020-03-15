<?php 

function draw_checkout_list(){ ?>

<?php } 

function draw_cart_list(){ ?>
<div class="container">
    <div class="row">
    <h2 class="shopping-cart-h">My Shopping Cart</h2>
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
                <?php draw_checkout_table_item1();
                    draw_checkout_table_item2();
                    draw_checkout_table_item3();
                    draw_checkout_table_item4();
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
        <div class="row checkout-menu d-flex justify-content-between buttons " id="checkout-buttons-div">
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

function draw_checkout_table_item1(){ ?>
     <tr class="checkout-item-list">
        <td scope="row">
            <a href="item-page">
                <img src="https://amotatuagem.com/wp-content/uploads/2018/06/Unalome-Tattoo-10.jpg" alt="">
            </a>
        </td>
        <th colspan="0">
            <a href="item-page">
                Girly Design
            </a>
        </th>
        <td colspan="0" class="item-price">89.90€</td>
        <td colspan="0">
            <button type="button" class="btn btn-primary sub-button">
                <i class="fas fa-minus"></i>
            </button>   
            <span class="item-quant">1</span>
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

function draw_checkout_table_item2(){ ?>
    <tr class="checkout-item-list">
       <td scope="row">
           <a href="item-page">
               <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" alt="">
           </a>
       </td>
       <th colspan="0">
           <a href="item-page">
            Tattoo Machine
           </a>
       </th>
       <td colspan="0" class="item-price">39.95 €</td>
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

function draw_checkout_table_item3(){ ?>
    <tr class="checkout-item-list">
       <td scope="row">
           <a href="item-page">
               <img src="https://www.inkme.tattoo/wp-content/uploads/2016/10/forearm-tattoo-design-86.jpg" alt="">
           </a>
       </td>
       <th colspan="0">
           <a href="item-page">
              Awesome Design
           </a>
       </th>
       <td colspan="0" class="item-price">10.00€</td>
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

function draw_checkout_table_item4(){ ?>
    <tr class="checkout-item-list">
       <td scope="row">
           <a href="item-page">
               <img src="https://cdn.shopify.com/s/files/1/1314/0625/products/19_Color_Ink_Set_600x600.jpg?v=1498235476" alt="">
           </a>
       </td>
       <th colspan="0">
           <a href="item-page">
            19 Ink Color Set
           </a>
       </th>
       <td colspan="0" class="item-price">99.99€</td>
       <td colspan="0">
           <button type="button" class="btn btn-primary sub-button">
               <i class="fas fa-minus"></i>
           </button>   
           <span class="item-quant"> 2</span>
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