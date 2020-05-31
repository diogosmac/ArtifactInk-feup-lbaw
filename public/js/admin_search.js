var minSlider = document.getElementById('minPrice');
var maxSlider = document.getElementById('maxPrice');
var minValue = minSlider.value;
var maxValue = maxSlider.value;

var submitButton = document.getElementById('filterSubmit');

function updateMin() {
    minValue = parseFloat(minSlider.value);
    if (minValue >= maxValue) {
        minValue = maxValue - 1;
        minSlider.value = minValue;
    }
}

function updateMax() {
    maxValue = parseFloat(maxSlider.value);
    if (maxValue <= minValue) {
        maxValue = minValue + 1;
        maxSlider.value = maxValue;
    }
}

function getPriceRangeVals() {

    updateMin();
    updateMax();

    var display = document.getElementById('priceRangeDisplay');

    display.innerHTML = minValue + "€ - " + maxValue + "€";

}

function parseURL() {

    queryString = window.location.search.slice();
    urlParams = new URLSearchParams(queryString);

    if (urlParams.has('query')) {
        query = urlParams.get('query')
        document.getElementById('filterQuery').value = query
    }

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
    if (urlParams.has('sortOrder')) {
        sortOrderVal = urlParams.get('sortOrder')
    }

}

function checkSliders() {
    minSlider.disabled = (minValue == 0);
    maxSlider.disabled = (maxValue == 500);
}

window.onload = function () {

    minSlider.oninput = getPriceRangeVals;
    maxSlider.oninput = getPriceRangeVals;

    submitButton.onclick = checkSliders;

    parseURL();
    getPriceRangeVals();

}