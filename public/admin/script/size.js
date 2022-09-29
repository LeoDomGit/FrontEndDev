$(document).ready(function () {
    addSize();
});
function addSize(){
    $("#addNewSizeBtn").click(function (e) { 
        e.preventDefault();
        var sizeName = $("#sizeName").val().trim();
        var sizeInfo = $("#sizeInfo").val().trim();
        if(sizeName==''||sizeInfo==''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Thiếu tên size hoặc thông tin size!',
              })
        }else{
            
        }
    });
}