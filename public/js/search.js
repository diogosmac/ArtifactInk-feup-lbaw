var minValue = 0;
var maxValue = 500;

function updateMin() {
    minPrice = document.getElementById('minPrice');
    minValue = parseFloat(minPrice.value);
    if (minValue > maxValue) {
        minValue = maxValue;
        minPrice.value = maxValue;
    }
}

function updateMax() {
    maxPrice = document.getElementById('maxPrice');
    maxValue = parseFloat(maxPrice.value);
    if (maxValue < minValue) {
        maxValue = minValue;
        maxPrice.value = minValue;
    }
}

function getVals() {

    updateMin();
    updateMax();

    var parent = document.getElementById('priceLimitDisplay');

    parent.innerHTML = minValue + "€ - " + maxValue + "€";

}

function updateFilters() {

    queryString = window.location.search;
    urlParams = new URLSearchParams(queryString);

    if (urlParams.has('orderBy')) {
        orderBy = urlParams.get('orderBy')
        document.getElementById('searchResultSortOrder').value = orderBy
    }

    if (urlParams.has('category[]')) {
        categories = urlParams.getAll('category[]')
        checkboxes = document.querySelectorAll('.categoryCheckbox');
        for (category of categories) {
            for (checkbox of checkboxes) {
                if (checkbox.value == category)
                    checkbox.checked = true;
            }
        }
    }

    if (urlParams.has('brand[]')) {
        brands = urlParams.getAll('brand[]')
        checkboxes = document.querySelectorAll('.brandCheckbox');
        for (brand of brands) {
            for (checkbox of checkboxes) {
                if (checkbox.value == brand)
                    checkbox.checked = true;
            }
        }
    }

    if (urlParams.has('inStock')) {
        inStock = urlParams.get('inStock')
        document.getElementById('stockSwitch').checked = true
    }

    if (urlParams.has('minPrice')) {
        minPrice = urlParams.get('minPrice')
        document.getElementById('minPrice').value = minPrice
    }

    if (urlParams.has('maxPrice')) {
        maxPrice = urlParams.get('maxPrice')
        document.getElementById('maxPrice').value = maxPrice
    }

}

// Initialize Sliders
window.onload = function () {

    var minSlider = document.getElementById('minPrice');
    var maxSlider = document.getElementById('maxPrice');

    minSlider.oninput = getVals;
    maxSlider.oninput = getVals;

    this.updateFilters();
    
    this.getVals();

}
