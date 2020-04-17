<aside class="d-flex flex-column justify-content-center bg-light rounded p-2">
        <h4 class="text-start">Filters</h4>
        <div>
            <label class="mt-2" for="categories">Categories</label>
            <div id="categories" class="rounded border border-secondary p-2" style="max-height:10em; overflow-y: scroll">
                <?php for ($i = 1; $i < 6; $i++) { ?>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="category<?= $i ?>">
                        <label class="custom-control-label" for="category<?= $i ?>">Category <?= $i ?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div>
            <label class="mt-3" for="brands">Brands</label>
            <div id="brands" class="rounded border border-secondary p-2" style="max-height:10em; overflow-y: scroll">
                <?php for ($i = 1; $i < 6; $i++) { ?>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="brand<?= $i ?>">
                        <label class="custom-control-label" for="brand<?= $i ?>">Brand <?= $i ?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="custom-control custom-switch my-3">
            <input type="checkbox" class="custom-control-input" id="stockSwitch">
            <label class="custom-control-label" for="stockSwitch">In-Stock</label>
        </div>
        <div>
            <label id="minPriceLabel" for="minPrice">Minimum Price</label>
            <input type="range" class="custom-range" value="20" min="0" max="500" step="2" id="minPrice">
        </div>
        <div>
            <label id="maxPriceLabel" for="maxPrice">Maximum Price</label>
            <input type="range" class="custom-range" value="100" min="0" max="500" step="2" id="maxPrice">
        </div>
        <button class="btn btn-primary button my-2" type="submit">Apply</button>
    </aside>