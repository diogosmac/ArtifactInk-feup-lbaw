<nav id="secondary-navbar" class="navbar navbar-expand-lg navbar-custom-bot ">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBotSupportedContent" aria-controls="navbarBotSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="fas fa-bars pt-1"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
      <ul class="navbar-nav nav-fill w-100">
        @foreach ($parent_categories as $parent_category)
        <li class="nav-item">
          <div class="dropdown dropdownSupplies">
            <a class="btn btn-secondary one-line" href="{{ url('/category/' . $parent_category->id) }}" role="button" aria-haspopup="true" aria-expanded="false">
              {{ $parent_category->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              @foreach ($parent_category->children as $child_category)
                <a class="dropdown-item" href="{{ url('/category/' . $child_category->id) }}">{{ $child_category->name }}</a>
              @endforeach
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>