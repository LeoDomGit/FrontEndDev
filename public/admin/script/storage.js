$(document).ready(function () {
    selectProduct();
});
function selectProduct(){
    $('#ProductSelect').change(function (e) { 
        e.preventDefault();
        var idProd = $("#ProductSelect option:selected").val();
        console.log(idProd);
    });
}