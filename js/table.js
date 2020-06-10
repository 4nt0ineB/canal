var options = {
  valueNames: ["name", "description", "category"],
};

var featureList = new List("lovely-things-list", options);

$("#filter-none").click(function () {
  featureList.filter();
  return false;
});

$("#filter-velo").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "velo") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});

$("#filter-chambresD").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "chambres d'hôtes") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});


$("#filter-gite").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "gite") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});

$("#filter-kayak").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "kayak") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});

$("#filter-croisiere").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "croisiere") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});

$("#filter-bateau").click(function () {
  featureList.filter(function (item) {
    if (item.values().category == "bateau") {
      return true;
    } else {
      return false;
    }
  });
  return false;
});