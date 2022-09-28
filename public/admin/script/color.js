$(document).ready(function () {
    addColor();
    editColor();
});
function deleteColor(){
  $(".deleteColor").click(function (e) { 
    e.preventDefault();
    let idColor= $(this).attr('data-id');
    
  });
}
/**
 * 
 * 
 * 
 */

function addColor(){
    $("#saveColorBtn").click(function (e) { 
        e.preventDefault(); 
        var colorname = $("#newColorName").val().trim();
        var newColorcode = $("#newColorpath").val().trim();
        if(colorname==''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tên màu không được để trống',
              })
        }else{
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addColor",
                data: {
                    colorname:colorname,
                    newColorcode:newColorcode
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
                            title: 'Đã tồn tại màu sắc này'
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
function editColor(){
  $('.colorclass').click(function (e) { 
    e.preventDefault();
    let idColor= $(this).attr('data-id');
    $('#submiteditColor').click(function (e) { 
      e.preventDefault();
      var colorname1 = $("#newColorName1").val().trim();
      var newColorcode1 = $("#newColorpath1").val().trim();
      if(colorname1==''){
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
          title: 'Thiếu tên màu'
        })
      }else if(newColorcode1==''){
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
          title: 'Thiếu mã màu'
        })
      }else{
        $.ajax({
          type: "post",
          url: "http://127.0.0.1:3000/api/editColor",
          data: {
            idColor:idColor,
            colorname:colorname1,
            newColorcode:newColorcode1,
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
                  title: 'Đã tồn tại màu sắc này'
                });
              }
          }
          }
        });
      }
    });
  });
}