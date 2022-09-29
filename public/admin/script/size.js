$(document).ready(function () {
    addSize();
});
function addSize(){
    $("#addNewSizeBtn").click(function (e) { 
        e.preventDefault();
        var sizeName = $("#sizeName").val().trim();
        var sizeInfo = $("#sizeInfo").val().trim();
        if(sizeName==''||sizeInfo==''){

        }else{
            
        }
    });
}