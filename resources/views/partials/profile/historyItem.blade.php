<section id="history-purchase">
    <div class="col" id="review-container">
      <div class="row" id="purchase-address">
        <span>Address St., 123 - 6º Esq. Frente</span>
      </div>
      <div class="row" id="purchase-details">
        <span>{{$order->date}}</span>
        <span>&nbsp;-&nbsp;</span>
        <span>{{$order->status}}</span>
      </div>

      <div class="col my-3" id="purchase-items-container">
        <?php $items = json_decode($items);
            print_r($pictures); ?>
        @foreach($items as $item)
          <?php $picture = json_decode($pictures[$loop->index]); ?> 
          @include('partials.profile.purchasedItem', ['item' => $item, 'picture' => $picture])
        @endforeach
       
      </div>

      <div class="row" id="purchase-shipping">
        <span>2,02€ :( não temos</span>
      </div>
      <div class="row" id="purchase-total">
        <span>{{$order->total}} €</span>
      </div>
  </section>