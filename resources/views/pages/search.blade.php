@extends('layouts.common')

@section('title', ' - Search \'' . $query . '\'')

<script src="{{ asset('js/search.js') }}" defer></script>

@section('content')
<section class="mx-auto my-4">
    <h3>Search for '<?= $query ?>'</h3>
    <form action="search" method="GET">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div>
                <input type="hidden" name="query" value="<?= $query ?>">
                <div class="input-group my-3" id="searchOrder">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="searchResultSortOrder">Order by</label>
                    </div>
                    <select class="custom-select" name="orderBy" id="searchResultSortOrder"
                        @if(isset($orderBy))
                            value="<?= $orderBy ?>"
                        @else
                            value="bestMatch"
                        @endif
                        >
                        <option value="bestMatch">Best Match</option>
                        <option value="price">Price</option>
                        <option value="rating">Rating</option>
                    </select>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <input type="hidden" name="sortOrder" id="sortOrder">
                        <i type="checkbox" id="sortDesc" value="desc" class="fa fa-long-arrow-down order-icon" aria-hidden="true"></i>
                        <i type="checkbox" id="sortAsc" value="asc" class="fa fa-long-arrow-up order-icon" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-th-large"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-list"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-md-none my-2">
            <button class="btn btn-primary button collapsed" type="button" data-toggle="collapse" data-target="#mobileFilters" aria-expanded="false" aria-controls="mobileFilters">
                Filters
            </button>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="filters" class="d-none d-md-block col-md-3 my-2">
                    @include('partials.search.filters', ['categories' => $categories, 'brands' => $brands])
                </div>
                <div id="mobileFilters" class="collapse d-md-none col-md-3 my-2">
                    @include('partials.search.filters', ['categories' => $categories, 'brands' => $brands])
                </div>
                <section class="col-md-9">
                    <div class="tab-content mx-auto" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row justify-content-start">
                                @if(count($items) == 0)
                                <h5 class="pl-3">No products were found. Consider adjusting your search parameters!</h5>
                                @else
                                    @foreach($items as $item)
                                    <div class="p-0 col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
                                        @include('partials.item.item_card', ['item' => $item, 'picture' => $item->images()->get()->first()])
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <ul class="list-group">
                                @if(count($items) == 0)
                                    <h5>No products were found. Consider adjusting your search parameters!</h5>
                                @else
                                    @foreach($items as $item)
                                        @include('partials.item.item_card_alt', ['item' => $item, 'picture' => $item->images()->get()->first()])
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{$items->appends(request()->except('page'))->links()}}                    
                </section>
            </div>
        </div>
    </form>
</section>
    
@endsection