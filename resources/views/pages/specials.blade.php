@extends('layouts.common')

@section('title', ' - ' . $name)

<script src="{{ asset('js/search.js') }}" defer></script>

@section('content')
<section class="mx-auto my-4">
    <form action="{{ $url }}" method="GET">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h3>{{ $name }}</h3>
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
                    @include('partials.search.filters', [])
                </div>
                <div id="mobileFilters" class="collapse d-md-none col-md-3 my-2">
                    @include('partials.search.filters', [])
                </div>
                <section class="col-md-9">
                    <div class="tab-content mx-auto" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row justify-content-start">
                                @foreach($items as $item)
                                    @php 
                                        $sales = $item->sales;
                                        $currentSale = 0;
                                        $price = $item->price;
                                        foreach ($sales as $sale) {
                                            $new_sale = 0;
                                            if ($sale->type == 'percentage') {
                                                $new_sale = 0.01 * $sale->percentage_amount * $price;
                                            } else if ($sale->type == 'fixed') {
                                                $new_sale = $sale->fixed_amount;
                                            }
                                            if ($new_sale > $currentSale) {
                                                $currentSale = $new_sale;
                                            }
                                        }
                                        $price = round($price - $currentSale, 2);
                                    @endphp
                                    <div class="p-0 col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
                                        @include('partials.item.item_card', [
                                            'item' => $item, 'price' => $price, 'picture' => $item->images->first()])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <ul class="list-group">
                                @foreach($items as $item)
								    @include('partials.item.item_card_alt', ['item' => $item, 'picture' => $item->images()->get()->first()])
							    @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
</section>
@endsection
