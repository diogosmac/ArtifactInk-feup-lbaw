<aside class="d-flex flex-column justify-content-center bg-light rounded p-2">
        <h4 class="text-start">Filters</h4>
        @if (count($categories) > 0)
        <div>
            <label class="mt-2" for="categories">Categories</label>
            <div id="categories" class="rounded border border-secondary px-2" style="max-height:10em; overflow-y: scroll">
                @for ($i = 0; $i < count($categories); $i++)
                    @php
                        $category = $categories[$i];
                        $categoryId = $category['id'];
                        $categoryName = $category['name'];
                    @endphp
                    <div class="custom-control custom-checkbox my-2">
                        <input type="checkbox" class="custom-control-input categoryCheckbox" name="category[]" id="category<?= $i ?>" value="<?= $categoryId ?>">
                        <label class="custom-control-label" for="category<?= $i ?>"><?= $categoryName ?></label>
                    </div>
                @endfor
            </div>
        </div>
        @endif
        <div>
            <label class="mt-3" for="brands">Brands</label>
            <div id="brands" class="rounded border border-secondary px-2" style="max-height:10em; overflow-y: scroll">
                @for ($i = 0; $i < count($brands); $i++)
                    @php
                        $brand = $brands[$i];
                    @endphp
                    <div class="custom-control custom-checkbox my-2">
                        <input type="checkbox" class="custom-control-input brandCheckbox" name="brand[]" id="brand<?=$i?>"  value="<?= $brand ?>">
                        <label class="custom-control-label" for="brand<?= $i ?>"><?= $brand ?></label>
                    </div>
                @endfor
            </div>
        </div>
        <div class="custom-control custom-switch my-3">
            <input type="checkbox" class="custom-control-input" name="inStock" id="stockSwitch">
            <label class="custom-control-label" for="stockSwitch">In Stock</label>
        </div>
        <div class="range-slider mt-0 mb-3 align-items-center">
            <label id="priceRangeLabel" class="w-100 d-flex justify-content-start" for="price">
                Price Range
            </label>
            <input type="range" class="custom-range" style="color: var(--main-red)" value="0" min="0" max="{{ $maxPrice }}" step="1" name="minPrice" id="minPrice">
            <input type="range" class="custom-range" style="color: var(--main-red)" value="{{ $maxPrice }}" min="0" max="{{ $maxPrice }}" step="1" name="maxPrice" id="maxPrice">
        </div>
        <center>
            <h3 id="priceRangeDisplay">N/A</h3>
        </center>
        <button class="btn btn-primary button my-2" id="filterSubmit" type="submit">Apply</button>
    </aside>
