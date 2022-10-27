$(document).ready(function () {
    addTag();
    editTag();
    deleteTag();
    switchTag();
});
function deleteTag(){
  $(".deleteTag").click(function (e) { 
    e.preventDefault();
    let idtag= $(this).attr('data-id');
    Swal.fire({
      icon:'question',
      title: 'Bạn muốn xóa tag ?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Xóa',
      denyButtonText: `Giữ lại !`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: "https://api.trungthanhweb.com/api/deleteTag",
          data: {idtag:idtag},
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
                  title: ' Tồn tại sản phẩm có tag này'
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
          title: 'OK! Giữ lại'
        })
      }
    })
  });
}
function addTag(){
    $("#saveTagBtn").click(function (e) { 
        e.preventDefault(); 
        var tagname = $("#newTagName").val().trim();
        if(tagname==''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tên tag không được để trống',
              })
        }else{
            $.ajax({
                type: "post",
                url: "https://api.trungthanhweb.com/api/addTag",
                data: {
                    tagname:tagname
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
                            title: 'Đã tồn tại tag này'
                          });
                        }
                    }
                }
            });
        }
    });
}
function editTag(){
  $('.tagclass').click(function (e) { 
    e.preventDefault();
    let idtag= $(this).attr('data-id');
    $(document).on("submit", "#form-update-tag",function (e) { 
      e.preventDefault();
      var idTag = $(this).data("id");
      var tagname1 = $("#newTagName1" + idTag).val();
      if(tagname1==''){
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
          title: 'Thiếu tên tag'
        })
      }else{
        $.ajax({
          type: "post",
          url: "https://api.trungthanhweb.com/api/editTag",
          data: {
            idtag:idtag,
            tagname:tagname1,
            
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
                  title: 'Đã đổi thành công'
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
                  title: 'Đã tồn tại tag này'
                });
              }
          }
          }
        });
      }
    });
  });
}
function switchTag(){
  $('.turnBtn').click(function (e) { 
    e.preventDefault();
    var idtag  = $(this).attr('data-id');
    $.ajax({
      type: "post",
      url: "https://api.trungthanhweb.com/api/switchTag",
      data: {idtag:idtag},
      dataType: "JSON",
      success: function (response) {
        if (response.check == true) {
          const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener(
                      "mouseenter",
                      Swal.stopTimer
                  );
                  toast.addEventListener(
                      "mouseleave",
                      Swal.resumeTimer
                  );
              },
          });

          Toast.fire({
              icon: "success",
              title: "Đã thay đổi thành công",
          }).then(() => {
            window.location.reload();
          });
      } else {
          if (response.message == "rejected") {
              const Toast = Swal.mixin({
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                      toast.addEventListener(
                          "mouseenter",
                          Swal.stopTimer
                      );
                      toast.addEventListener(
                          "mouseleave",
                          Swal.resumeTimer
                      );
                  },
              });

              Toast.fire({
                  icon: "error",
                  title: "Dữ liệu không hợp lệ",
              });
          }
      }
      }
  });
  });

}