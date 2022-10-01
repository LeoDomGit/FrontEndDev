$(document).ready(function () {
    addStorages();
    editStorages();
    deleteStorages();
});
function deleteStorages(){
    $(".deleteStorages").click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('data-id');
        Swal.fire({
            title: 'Bạn muốn xóa storages?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Xóa',
            denyButtonText: `Không xóa`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/deleteStorages",
                data: {
                    id:id
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
                            title: 'Không tồn tại storages !'
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
                                title: 'Tồn tại sản phẩm mang storages !'
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
/**
 * 
 * 
 * 
 */

 function addStorages(){
    $("#saveStoragesBtn").click(function (e) { 
        e.preventDefault();
        var storageName = $("#storageName").val().trim();
        var storageInfo = $("#storageInfo").val().trim();
        if(storageName==''||storageInfo==''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Thiếu tên storages hoặc thông tin storages!',
              });
        }else{
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addStorages",
                data: {
                    storageName:storageName,
                    storageInfo:storageInfo
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
                            title: 'Đã tồn tại thông tin storages'
                          });
                        }
                    }
                }
            });
        }
    });
}
/**
 * 
 * 
 * 
 */
 function editStorages(){
    $(".editStorages").click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('data-id');
        $("#editStoragesBtn").click(function (e) { 
            e.preventDefault();
            var storageNameEdit= $("#storageNameEdit").val().trim();
            var storageInfoEdit= $("#storageInfoEdit").val().trim();
            if(storageNameEdit==''||storageInfoEdit==''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Thiếu tên Storages hoặc thông tin Storages !',
                  });
            }else{
                $.ajax({
                    type: "post",
                    url: "http://127.0.0.1:3000/api/editStorages",
                    data: {
                        id:id,
                        storageNameEdit:storageNameEdit,
                        storageInfoEdit:storageInfoEdit,
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
                                title: 'Đã chỉnh sửa thành công'
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
                                title: 'Không tồn tại mã storages !'
                              });
                            }
                        }
                    }
                });
            }
        });
    });
}