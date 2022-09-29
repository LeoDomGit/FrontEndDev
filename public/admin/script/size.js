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
              });
        }else{
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addSize",
                data: {
                    sizeName:sizeName,
                    sizeInfo:sizeInfo
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.check==true){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                              toast.addEventListener('mouseenter', Swal.stopTimer)
                              toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                          })
                          
                          Toast.fire({
                            icon: 'success',
                            title: 'Đã thêm thành công'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }else{
                        if(response.message=='rejected'){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                              })
                              
                              Toast.fire({
                                icon: 'error',
                                title: 'Dữ liệu không hợp lệ'
                              });
                        }else if(response.message=='exist'){
                          const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                              toast.addEventListener('mouseenter', Swal.stopTimer)
                              toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                          })
                          
                          Toast.fire({
                            icon: 'error',
                            title: 'Đã tồn tại thông tin size'
                          });
                        }
                    }
                }
            });
        }
    });
}