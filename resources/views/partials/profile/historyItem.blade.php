<section id="history-purchase">
    <div class="col" id="review-container">
      <div class="row" id="purchase-address">
            {{ $order->address->street }}
            <br>
            {{$order->address->city . ', ' . $order->address->postal_code}} 
            <br>
            {{$order->address->country->name}}
      </div>
      <div class="row" id="purchase-details">
        <span>{{$order->date}}</span>
        <span>&nbsp;-&nbsp;</span>
        <span>{{$order->status}}</span>
      </div>

      <div class="col my-3" id="purchase-items-container">
        @foreach($order->items as $item) 
          @include('partials.profile.purchasedItem', ['item' => $item])
        @endforeach
       
      </div>

      <div class="row" id="purchase-shipping">
        <span>2,02€ :( não temos</span>
      </div>
      <div class="row" id="purchase-total">
        <span>{{$order->total}} €</span>
      </div>
  </section>