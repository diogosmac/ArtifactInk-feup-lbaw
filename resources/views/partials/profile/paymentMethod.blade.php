<div class="d-flex justify-content-between align-items-center">
    <div>
        <span class="row profile-field">Payment Method {{$loop}}</span>
        @if($paymentMethod->id_cc != null)
            <span> 
                Credit Card 
                <br>
                {{'Holder: ' . $paymentMethod->credit_card->name . ' Ending in ' .  substr ($paymentMethod->credit_card->number, -4) }}
                <br>
                {{'Expiring: ' . $paymentMethod->credit_card->expiration }}
            </span>
        @else
            <span>PayPayl 
                <br>
                {{'Email associated: ' . $paymentMethod->paypal->email}}
            </span>
        @endif
    </div>
    <button class="btn button-secondary">Edit Method </button>
</div>