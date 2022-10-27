$(document).ready(function () {
    addSize();
    editSize();
    deleteSize();
});
function deleteSize(){
    $(".deleteSize").click(function (e) { 
        e.preventDefault();
        var idSize = $(this).attr('data-id');
        Swal.fire({
            title: 'Bạn muốn xóa loại size?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Xóa',
            denyButtonText: `Không xóa`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              $.ajax({
                type: "post",
                url: "https://api.trungthanhweb.com/api/deleteSize",
                data: {
                    idSize:idSize
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
                            title: 'Đã xóa thành công'
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
                        }else if(response.message=='notexists'){
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
                            title: 'Không tồn tại mã size !'
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
                                title: 'Tồn tại sản phẩm mang mã size !'
                              });
                        }
                    }
                }
              });
            } else if (result.isDenied) {
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
                    title: 'OK ! Không xóa !'
                  })
            }
          })
    });
}
/*
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
*/
function editSize(){
    $(".editSize").click(function (e) { 
        e.preventDefault();
        var idSize = $(this).attr('data-id');
        $(document).on("submit", "#form-update-size",function (e) { 
            e.preventDefault();
            var idSize = $(this).data("id");
            var newName= $("#sizenameEdit" + idSize).val();
            var sizeinfoEdit= $("#sizeinfoEdit"+idSize).val();
            if(newName==''||sizeinfoEdit==''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Thiếu tên kích thước mới hoặc thông tin kích thước !',
                  });
            }else{
                $.ajax({
                    type: "post",
                    url: "https://api.trungthanhweb.com/api/editSize",
                    data: {
                        idSize:idSize,
                        newName:newName,
                        sizeinfoEdit:sizeinfoEdit,
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
                            }else if(response.message=='notexists'){
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
                                title: 'Không tồn tại mã size !'
                              });
                            }
                        }
                    }
                });
            }
        });
    });
}
/*
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
 * * * * * * * * * * * * * * * 
*/

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
                url: "https://api.trungthanhweb.com/api/addSize",
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