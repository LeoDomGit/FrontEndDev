$(document).ready(function () {
    selectProduct();
    ColorPick();

});
function ColorPick(){

}
function selectProduct(){
    $('#ProductSelect').change(function (e) { 
        e.preventDefault();
        var idProd = $("#ProductSelect option:selected").val();
        $.ajax({
            type: "post",
            url: "https://api.trungthanhweb.com/api/colorProduct",
            data: {idProd:idProd},
            dataType: "JSON",
            success: function (response) {
                if(response.check==true){
                    if(response.state==0){
                        $("#ResultColorModal").modal('show');
                    }
                }
            }
        });
        
    });
}