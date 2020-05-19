var options = {
    valueNames: ['name', 'description', 'category']
};

var featureList = new List('lovely-things-list', options);

$('#filter-games').click(function () {
    featureList.filter(function (item) {
        if (item.values().category == "Game") {
            return true;
        } else {
            return false;
        }
    });
    return false;
});

$('#filter-kayak').click(function () {
    featureList.filter(function (item) {
        if (item.values().category == "kayak") {
            return true;
        } else {
            return false;
        }
    });
    return false;
});



$('#filter-none').click(function () {
    featureList.filter();
    return false;
});