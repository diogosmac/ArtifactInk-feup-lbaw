<div class="border-bottom card chat-card p-2 m-1">
  <div class="row align-items-center no-gutters">
    <div class="col-md-4">
      <img src="{{ asset('storage/img_user/' . $user->img) }}" class="card-img" alt="UserPhoto">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{ $user->message }}</p>
      </div>
    </div>
  </div>
</div>