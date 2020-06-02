<div class="collapse navbar-collapse" id="navbarBotSupportedContentMobile">
  <ul class="navbar-nav nav-fill w-100">
    @foreach ($parent_categories as $parent_category)
    <li class="nav-item ">
      <div class="dropdown dropdownSupplies">
        <a class="btn btn-secondary secondary-nav-link ml-auto" role="button">
          {{ $parent_category->name }}
        </a>
        <div class="subclass-nav-mobile">
          @foreach ($parent_category->children as $child_category)
            <a class="dropdown-item" href="{{ url('/category/' . $child_category->id) }}">{{ $child_category->name }}</a>
          @endforeach
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>