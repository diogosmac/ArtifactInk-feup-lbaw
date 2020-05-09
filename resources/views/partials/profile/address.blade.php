<div class="d-flex justify-content-between align-items-center">
    <div>
        <span class="row profile-field">Address {{$loop}}</span>
        <span>
            {{ $address->country->name . ' - ' . $address->city}}
            <br>
            {{ $address->street . ' - Postal-Code: ' . $address->postal_code}}
        </span>
    </div>
    <button class="btn button-secondary">Edit Adress</button>
</div>