$("#btnAddImageProduct").hide();
$(document).ready(function () {
    addProduct();
});
function addProduct(){
    $("#btnAddProduct").click(function (e) { 
        e.preventDefault();
        var prodName = $("#prodName").val().trim();
        var price = $("#price").val().trim();
        var discount = $("#discount").val().trim();
        var prodTypeID = $("#prodTypeID :selected").val();
        var brandID = $("#brandID :selected").val();
        console.log(prodTypeID,brandID);
        // $("#btnAddImageProduct").show();
    });
}