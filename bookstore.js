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
