$(document).ready(function () {
    $('#loading-image').show();
    addCate();
    switchCate();
    editCate();
    deleteCate();
});
function deleteCate(){
    $('.deleteCate').click(function (e) { 
        e.preventDefault();
        var idCate = $(this).attr('data-id');
        Swal.fire({
            icon:'question',
            text: 'Bạn muốn xóa loại sản phẩm?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            denyButtonText: `Không!`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/deleteCate",
                data: {
                    idCate:idCate
                },
                dataType: "json",
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
                    title: 'Ok ! Giữ lại'
                  })
            }
          })
    });
}
/* 
-----------------
*
    *
        *
            * 
                *  
------------------
*/
function editCate(){
    $(".editCate").click(function (e) { 
        e.preventDefault();
        var idCate = $(this).attr('data-id');
        $("#submiteditCateBtn").click(function (e) { 
            e.preventDefault();
            var newCate = $("#newCateEdit").val().trim();
            if(newCate==''){
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
                    title: 'Tên loại sản phẩm không được rỗng'
                  });
            }else{
                $.ajax({
                    type: "post",
                    url: "http://127.0.0.1:3000/api/editCate",
                    data: {
                        idCate:idCate,
                        newCate:newCate
                    },
                    dataType: "json",
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
                                title: 'Đã thay đổi thành công'
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
                                    title: 'Đã tồn tại loại sản phẩm',
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
-----------------
*
    *
        *
            * 
                *  
------------------
*/ 
function switchCate(){
    $(".switchCateBtn").click(function (e) { 
        e.preventDefault();
        var idCate = $(this).attr('data-id');
        var waiting = `<img style="width:200px" src="images/smile_loader_by_gleb.gif" id="WaitingImg" alt="">`;
        $("#waitingimage").append(waiting);
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:3000/api/switchCate",
            data: {
                idCate:idCate
            },
            dataType: "json",
            success: function (response) {
                $("#WaitingImg").remove();
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
                        title: 'Đã chuyển thành công'
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
                    }
                }
            }
        });
    });
}
/* 
-----------------
*
    *
        *
            * 
                *  
------------------
*/ 
function addCate(){
    $("#addnewcatebtn").click(function (e) { 
        e.preventDefault();
        var newcate = $("#newcateadd").val().trim();
        if(newcate==''){
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
                title: 'Tên loại sản phẩm không được rỗng'
              });
        }else{
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addCate",
                data: {
                    newcate:newcate
                },
                dataType: "json",
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
                                title: 'Loại sản phẩm đã được thêm trước đó'
                              });
                        }
                    }
                }
            });
        }
    });
}