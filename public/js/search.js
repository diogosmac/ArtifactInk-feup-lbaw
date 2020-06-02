var orderBy;

var minSlider;
var maxSlider;
var minValue = 0;
var maxValue = 500;

var ascSort;
var descSort;
var sortOrder;
var sortOrderVal = 'none';

var submitButton;


function updateMin() {
    minValue = parseFloat(minSlider.value);
    if (minValue > maxValue) {
        minValue = maxValue - 1;
        minSlider.value = minValue;
    }
}

function updateMax() {
    maxValue = parseFloat(maxSlider.value);
    if (maxValue < minValue) {
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
    if (sortOrderVal == 'asc')
        setAsc();
    else if (sortOrderVal == 'desc')
        setDesc();
    else if (sortOrderVal == 'none')
        return;
}

function checkInputs() {
    
    for (input of document.querySelectorAll('input')) {
        if (input.display == 'none')
            input.disabled = true;
    }

    if (orderBy != null) {
        orderBy.disabled = (orderBy.value == 'bestMatch' || orderBy.value == 'name');
    }

    if (minSlider != null) {
        minSlider.disabled = (minSlider.value == 0);
    }
    
    if (maxSlider != null) {
        maxSlider.disabled = (maxSlider.value == 500);
    }

}


window.onload = function () {

    var filters = document.getElementById('filters')
    var mobileFilters = document.getElementById('mobileFilters');
    if (filters != null) {
        var filtersDisplay = window.getComputedStyle(filters).display;
        if (filtersDisplay == 'none') {
            filters.remove();
        }
        else {
            mobileFilters.remove();
        }

    }

    orderBy = document.getElementById('searchResultSortOrder');

    var minSliders = document.querySelectorAll('#minPrice');
    for (slider of minSliders) {
        if (slider.disabled == false) {
            minSlider = slider;
            console.log(slider);
            break;
        }
    }

    var maxSliders = document.querySelectorAll('#maxPrice');
    for (slider of maxSliders) {
        if (slider.disabled == false) {
            maxSlider = slider;
            break;
        }
    }

    var ascSorts = document.querySelectorAll('#sortAsc');
    for (sort of ascSorts) {
        if (sort.disabled == false) {
            ascSort = sort;
            break;
        }
    }

    var descSorts = document.querySelectorAll('#sortDesc');
    for (sort of descSorts) {
        if (sort.disabled == false) {
            descSort = sort;
            break;
        }
    }

    var sortOrders = document.querySelectorAll('#sortOrder');
    for (order of sortOrders) {
        if (order.disabled == false) {
            sortOrder = order;
            break;
        }
    }

    var submitButtons = document.querySelectorAll('#filterSubmit');
    for (button of submitButtons) {
        if (button.disabled == false) {
            submitButton = button;
            break;
        }
    }


    if (ascSort != null) {
        ascSort.onclick = setAsc;
    }

    if (descSort != null) {
        descSort.onclick = setDesc;
    }
    
    if (minSlider != null) {
        minSlider.oninput = getPriceRangeVals;
    }
    
    if (maxSlider != null) {
        maxSlider.oninput = getPriceRangeVals;
    }

    if (submitButton != null) {
        submitButton.onclick = checkInputs;
    }

    if (sortOrder != null) {
        sortOrder.disabled = true;
    }

    this.parseURL();
    
    if (sortOrder != null) {
        this.setSortOrder();
    }
    
    this.getPriceRangeVals();

}
