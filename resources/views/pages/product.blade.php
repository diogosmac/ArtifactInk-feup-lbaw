@extends('layouts.common')

@section('title', ' - ' . $item->name)

@section('content')
<main>
  <section id="product" class="mx-auto">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-white mt-2 mb-1">
        <li class="breadcrumb-item"><a href="{{ route('category', ['id' => $item->category->parent->id, 'slug' => $item->category->parent->getSlug()]) }}" class="a_link">{{ $item->category->parent->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category', ['id' => $item->category->id, 'slug' => $item->category->getSlug()]) }}" class="a_link">{{ $item->category->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page" class="a_link">{{ $item->name }}</li>
      </ol>
    </nav>
    <div class="container-fluid d-none d-md-block">
      <div class="row">
        <div class="product-pictures col-6">
          @foreach($pictures as $picture)
            @if ($loop->first)
              <div class="text-center">
                <img  id="active"
                      src="{{ asset('storage/img_product/' . $picture->link) }}"
                      alt="Product Photo">
              </div>
              <div class="d-flex flex-row bd-highlight justify-content-center" style="max-height: 25%">
            @endif
                <div class="p-2 bd-highlight text-center">
                  <img  id="thumbnail"
                        src="{{ asset('storage/img_product/' . $picture->link) }}" 
                        alt="Product Thumbnail" class="image-fit">
                </div>
            @if ($loop->last)
            </div>
            @endif
          @endforeach
        </div>
        <div id="product-basics" class="col-6 d-flex flex-column justify-content-start">
          <h2>{{ $item->name }}</h2>
          <div class="d-flex flex-row align-items-center bd-highlight mb-3">
            @for ($i = 0; $i < 5; $i++)
              @if (($item->rating - $i) >= 1)
                <i class="fas fa-star"></i>
              @elseif (($item->rating - $i) > 0)
                <i class="fas fa-star-half-alt"></i>
              @else
                <i class="far fa-star"></i>
              @endif
            @endfor
            <a href="#specs" class="px-3 a_link">{{ count($reviews) }}</a>
          </div>
          <div class="d-flex flex-row justify-content-start bd-highlight mb-3 py-3 px-0">
            @if ($item->stock > 0 && $item->status == 'active')
              <h4>Available</h4>
              <i class="fas fa-circle px-2 pt-1" style="color: green"></i>
            @else
              <h4>Unavailable</h4>
              <i class="fas fa-circle px-2 pt-1" style="color: red"></i>
            @endif
          </div>
          <div class="d-flex flex-row justify-content-between bd-highlight mb-3 pb-1">
            <div class="input-group mb-3 w-50 pt-2">
              <div class="input-group-prepend">
                <label class="input-group-text" for="productQuantity">Quantity</label>
              </div>
              <select class="custom-select" id="productQuantity">
                @if ($item->status == 'active')
                    @for ($i = 1; $i <= $item->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                @else
                    <option value="0">0</option>
                @endif
              </select>
            </div>
            @if ($item->status == 'active')
                <?php 
                    $sales = $item->sales;
                    $currentSale = 0;
                    $price = $item->price;
                    foreach ($sales as $sale) {
                        if ($sale->type == 'percentage') {
                            $new_sale = 0.01 * $sale->percentage_amount * $price;
                            if ($new_sale > $currentSale) {
                                $currentSale = $new_sale;
                            }
                        } else if ($sale->type == 'fixed') {
                            if ($amount > $currentSale) {
                                $currentSale = $amount;
                                $output = "(-" . $amount . "€) ";
                            }
                        }
                    }
                    $price = round($price - $currentSale, 2);
                ?>
                <div class="row d-flex align-items-center">
                    @if ($currentSale > 0)
                        <h3 class="pr-2 old-price">{{ $item->price . '€' }}</h3>
                    @endif
                    <h1>{{ $price }}€</h1>
                </div>
            @else
            <h1>N/A</h1>
            @endif
          </div>
          <div class="d-flex flex-row justify-content-between align-items-end bd-highlight my-3">
            <?php 
                if ($item->status == 'active')
                    $value = $item->id;
                else
                    $value = 'archived';    
            ?>
            <button class="btn btn-link li-wishlist" data-id="{{ $value }}" type="button">
              <i class="fas fa-heart"></i>
              Add to whishlist
            </button>
            <button class="btn btn-primary button add-to-cart-btn" data-product-type="{{ $value }}" type="submit"> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column justify-content-center mx-2 mx-sm-3 d-md-none mx-2">
      <h2>{{ $item->name }}</h2>
      <div class="d-flex flex-row align-items-center bd-highlight mb-3">
        @for ($i = 0; $i < 5; $i++)
          @if (($item->rating - $i) >= 1)
            <i class="fas fa-star"></i>
          @elseif (($item->rating - $i) > 0)
            <i class="fas fa-star-half-alt"></i>
          @else
            <i class="far fa-star"></i>
          @endif
        @endfor
        <a href="#specs" class="px-3 a_link">{{ count($reviews) }}</a>
      </div>
    
      <div class="product-pictures">
        @foreach($pictures as $picture)
          @if ($loop->first)
            <div class="text-center">
              <img  id="active"
                    src="{{ asset('storage/img_product/' . $picture->link) }}"
                    alt="Product Photo">
            </div>
            <div class="d-flex flex-row bd-highlight justify-content-center" style="max-height: 25%">
          @endif
              <div class="p-2 bd-highlight text-center">
                <img  id="thumbnail"
                      src="{{ asset('storage/img_product/' . $picture->link) }}" 
                      alt="Product Thumbnail" class="image-fit">
              </div>
          @if ($loop->last)
            </div>
          @endif
        @endforeach
      </div>
      <div class="d-flex flex-row justify-content-start bd-highlight mb-3 py-3 px-0">
            @if ($item->stock > 0 && $item->status == 'active')
              <h4>Available</h4>
              <i class="fas fa-circle px-2 pt-1" style="color: green"></i>
            @else
              <h4>Unavailable</h4>
              <i class="fas fa-circle px-2 pt-1" style="color: red"></i>
            @endif
      </div>
      <div class="d-flex flex-row justify-content-between bd-highlight mb-3 pb-1">
        <div class="input-group mb-3 w-50 pt-2">
          <div class="input-group-prepend">
            <label class="input-group-text" for="productQuantityMobile">Quantity</label>
          </div>
          <select class="custom-select" id="productQuantityMobile">
                @if ($item->status == 'active')
                    @for ($i = 1; $i <= $item->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                @else
                    <option value="0">0</option>
                @endif
          </select>
        </div>
        <?php 
                $sales = $item->sales;
                $currentSale = 0;
                $price = $item->price;
                foreach ($sales as $sale) {
                    if ($sale->type == 'percentage') {
                        $new_sale = 0.01 * $sale->percentage_amount * $price;
                        if ($new_sale > $currentSale) {
                            $currentSale = $new_sale;
                        }
                    } else if ($sale->type == 'fixed') {
                        if ($amount > $currentSale) {
                            $currentSale = $amount;
                            $output = "(-" . $amount . "€) ";
                        }
                    }
                }
                $price = round($price - $currentSale, 2);
        ?>
        <div class="row d-flex align-items-center mr-1">
            @if ($currentSale > 0)
                <h4 class="pr-2 old-price">{{ '( ' . $item->price . '€ )' }}</h4>
            @endif
            <h2>{{ $price }}€</h2>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-between bd-highlight my-2">
        <button class="btn btn-link li-wishlist" data-id="{{ $item->id }}" type="button">
          <i class="fas fa-heart"></i>
          Add to whishlist
        </button>
        <button class="btn btn-primary button add-to-cart-btn" data-product-type="{{ $value }}" data-device-type="mobile" type="submit"> Add to Cart</button>
      </div>
    </div>
  </section>

  <hr class="w-75">
  <div id="related" class="mx-auto">
    @include('partials.item_deals', [])
  </div>
  <hr class="w-75">

  <section id="specs" class="mx-auto">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active a_link" id="nav-specs-tab" data-toggle="tab" href="#nav-specs" role="tab" aria-controls="nav-specs" aria-selected="true">Technical Specs</a>
        <a class="nav-item nav-link a_link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      
      <div class="tab-pane fade show active bg-light p-5" id="nav-specs" role="tabpanel" aria-labelledby="nav-specs-tab">
        <p>{{ $item->description }}</p>
      </div>

      <div class="tab-pane fade bg-light p-4" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
        <div class="d-flex flex-row bd-highlight justify-content-around my-2">
          <div class="d-flex flex-column align-items-center">
          @if(count($reviews) == 0)
            <p>There are no reviews yet</p>
          @else
            <div class="d-flex flex-row bd-highlight mb-3">
            @for ($i = 0; $i < 5; $i++)
              @if (($item->rating - $i) >= 1)
                <i class="fas fa-star"></i>
              @elseif (($item->rating - $i) > 0)
                <i class="fas fa-star-half-alt"></i>
              @else
                <i class="far fa-star"></i>
              @endif
            @endfor
            </div>
            <h5>{{ $item->rating }}/5</h5>
          @endif
          </div>
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-primary button">Write a review</button>
          </div>
        </div>
        
        @unless(count($reviews) == 0)
        <div class="border-top border-dark my-4">
          <div class="input-group my-3 col-lg-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="reviewOrder">Order by</label>
            </div>
            <select class="custom-select" id="reviewOrder">
              <option value="1" selected>Newer</option>
              <option value="2">Older</option>
              <option value="3">Rating Lower to Higher</option>
              <option value="4">Rating Higher to Lower</option>
            </select>
          </div>
          <div class="py-4">
            @each('partials.product.review', $reviews, 'review')
          </div>
        </div>
        @endunless
      </div>
    </div>
  </section>
</main>

@endsection

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

{{-- Alert --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
