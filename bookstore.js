function incrementQty() {
    // Increase the Quantity field by 1
    var qty = document.getElementsByName("Qty")[0].value;
    document.getElementsByName("Qty")[0].value = +qty+1;
}

function decrementQty() {
    // Decrease the Quantity field by 1
    var qty = document.getElementsByName("Qty")[0].value;
    document.getElementsByName("Qty")[0].value = +qty-1;
}

function showHide() {
    // Show or hide details in 'single.php'
    var div = document.getElementById("details");
    
    if (div.style.visibility !== "visible") {
        div.style.visibility = "visible";
    } else {
        div.style.visibility = "hidden";
    }
}
