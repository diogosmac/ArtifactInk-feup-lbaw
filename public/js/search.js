var minValue = 0;
var maxValue = 500;
var ascSort = document.getElementById('sortAsc');
var descSort = document.getElementById('sortDesc');
var sortOrder = document.getElementById('sortOrder');
var sortOrderVal = 'none';
var minSlider = document.getElementById('minPrice');
var maxSlider = document.getElementById('maxPrice');


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

function parseURL() {

    queryString = window.location.search.slice();
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
    if (urlParams.has('sortOrder')) {
        sortOrderVal = urlParams.get('sortOrder')
    }

}

function setAsc() {
    if (sortOrder.disabled == false && sortOrder.value == 'asc') {
        sortOrder.disabled = true;
        ascSort.style = "color:grey";
    } else {
        sortOrder.disabled = false;
        sortOrder.value = 'asc';
        ascSort.style = "color:black";
        descSort.style = "color:grey";
    }
}

function setDesc() {
    if (sortOrder.disabled == false && sortOrder.value == 'desc') {
        sortOrder.disabled = true;
        descSort.style = "color:grey";
    } else {
        sortOrder.disabled = false;
        sortOrder.value = 'desc';
        descSort.style = "color:black";
        ascSort.style = "color:grey";
    }
}

function setSortOrder() {
    if (sortOrderVal == 'none')
        return;
    else if (sortOrderVal == 'asc')
        setAsc();
    else if (sortOrderVal == 'desc')
        setDesc();
    else
        console.log("Oopsie-daisies");
}

// Initialize Sliders
window.onload = function () {

    var filters = document.getElementById('filters')
    var filtersDisplay = window.getComputedStyle(filters).display;
    if (filtersDisplay === 'none') {
        var inputs = filters.getElementsByTagName('input');
        for (input of inputs) {
            input.disabled = true;
        }
    }

    var mobileFilters = document.getElementById('mobileFilters')
    var mobileFiltersDisplay = window.getComputedStyle(mobileFilters).display;
    if (mobileFiltersDisplay === 'none') {
        var inputs = mobileFilters.getElementsByTagName('input');
        for (input of inputs) {
            input.disabled = true;
        }
    }

    ascSort.onclick = setAsc;
    descSort.onclick = setDesc;
    
    minSlider.oninput = getVals;
    maxSlider.oninput = getVals;

    this.parseURL();
    
    this.setSortOrder();
    
    this.getVals();

}
