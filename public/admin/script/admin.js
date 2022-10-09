$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    addUser();
    UserRole();
    showarea();
    preEdit();
    editUser();
});
function editUser(){
  
}
/*
=
  =
    = 
      =
        =
          = 
*/
function preEdit(){
  $('.editUser').click(function (e) { 
    e.preventDefault();
    var idUser = $(this).attr('data-id');
    $.ajax({
      type: "post",
      url: "https://api.trungthanhweb.com/api/singleUser",
      data: {
        idUser:idUser
      },
      dataType: "JSON",
      success: function (response) {
          if(response.check==true){
            var str =``;
            var idRole ='';
            var role='';
            idRole =response.user[0]['idRole'];
            for (let u = 0; u < response.roles.length; u++) {
                if(response.roles[u]['idRole']==idRole){
                  role+=`
                  <option selected value="`+response.roles[u]['idRole']+`">`+response.roles[u]['name']+`</option>
                  `;
                }else{
                  role+=`
                  <option value="`+response.roles[u]['idRole']+`">`+response.roles[u]['name']+`</option>
                  `;
                }
            }
            for (let i = 0; i < response.user.length; i++) {
              str+=`
              <input type="hidden" name="" value="`+response.user[0]['id']+`" id="idUserEdit">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="" id="usernameEdit" class="form-control" placeholder="" value="`+response.user[0]['username']+`">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="" id="emailEdit" class="form-control" placeholder="" value="`+response.user[0]['email']+`">
              </div>
              <div class="form-group">
                <label for="">Loại tài khoản</label>
               <select name="" class="form-control" id="idRoleEdit">
                  `+role+`
               </select>
              </div>
              `;
            }
            $("#userResult").html(str);
            $('#editUserModal').modal('show');
          }
      }
    });
  });
}
/*
=
  =
    = 
      =
        =
          = 
*/
function showarea(){
    $(".rolename").click(function (e) {
        e.preventDefault();
        var idRole= $(this).attr('data-id');
        Swal.fire({
          icon:'warning',
          text: 'Bạn muốn xóa loại tài khoản?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Xóa',
          denyButtonText: `Sửa`,
        }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  icon:'error',
                  text: 'Bạn muốn xóa loại tài khoản ?',
                  showDenyButton: true,
                  showCancelButton: true,
                  confirmButtonText: 'Xóa',
                  denyButtonText: `Không xóa`,
                }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          url: 'https://api.trungthanhweb.com/api/deleteRole',
                          type: "POST",
                          data: {
                              idRole: idRole,
                          },
                          success: function (response) {
                              if(response.check==401){
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
                                      title: response.message
                                    }).then(()=>{
                                      window.location.reload();
                                    })
                              }else if(response.status==400){
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
                                      title: 'Không thể xóa loại tài khoản !'
                                    });
                              }else if(response.check==200){
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
                                      title: 'Xóa loại tài khoản thành công',
                                    }).then(()=>{
                                      window.location.reload();
                                    })
                              }
                          }
                      })
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
          } else if (result.isDenied) {
              $("#updatebtnarea").removeClass('hidden');
              $("#updateRoleBtn").click(function (e) { 
                e.preventDefault();
                var newRole = $("#newUserEditRole").val().trim();
                if(newRole==''){
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
                    title: 'Loại tài khoản mới không được rỗng !'
                  })
                }else{
                  $.ajax({
                    type: "post",
                    url: "https://api.trungthanhweb.com/api/updateUserRole",
                    data: {
                      newUserRole:newRole,
                      idRole:idRole
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
                            title: 'Thay đổi thành công'
                          }).then(()=>{
                            window.location.reload();
                          })
                        }else{
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
                            title: 'Thay đổi không thành công'
                          })
                        }
                    }
                  });
                }
              });
          }
        });
    });
}
/*
=
  =
    = 
      =
        =
          = 
*/
function UserRole(){
    $('#addUserRolebtn').click(function (e) {
        var newUsRole = $("#newUserRole").val().trim();
        if(newUsRole!=''){
            $.ajax({
                url: 'https://api.trungthanhweb.com/api/addUserRole',
                type: "POST",
                data: {
                    newUsRole: newUsRole,
                },
                success: function (response) {
                    if(response.check==401){
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
                            title: response.message
                          }).then(()=>{
                            // window.location.reload();
                          })
                    }else if(response.check==400){
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
                            title: 'Đã tồn tại loại tài khoản !'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }else if(response.check==200){
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
                            title: 'Thêm mới thành công'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }
                }
            })
        }
})

}
/*
=
  =
    = 
      =
        =
          = 
*/
function addUser(){
    $( "#username" ).keyup(function() {
        var email=$("#email").val().trim();
        var username=$("#username").val().trim();
        if(email.length>3&&username.length>3&&username.length<80&&email.match(/(.+)@(.+)\.(com)/i)){
            $("#addUserBtn").removeClass('disabled');
        }else{
            $("#addUserBtn").addClass('disabled');
        }
    });
    $( "#email" ).keyup(function() {
        var email=$("#email").val().trim();
        var username=$("#username").val().trim();
        if(email.length>5&&username.length>3&&username.length<80&&email.match(/(.+)@(.+)\.(com)/i)){
            $("#addUserBtn").removeClass('disabled');
        }else{
            $("#addUserBtn").addClass('disabled');
        }
    });
    $("#addUserBtn").click(function (e) {
        e.preventDefault();
        var email=$("#email").val().trim();
        var username=$("#username").val().trim();
        var userRole = $("#userRole option:selected").val();
        if(email.length>5&&username.length>3&&username.length<80&&email.match(/(.+)@(.+)\.(com)/i)){
          var waiting = `<img style="width:200px" src="images/smile_loader_by_gleb.gif" id="WaitingImg" alt="">`;
          $("#waitingimage").append(waiting);
            $.ajax({
                url: 'https://api.trungthanhweb.com/register',
                type: "POST",
                data: {
                    username: username,
                    email:email,
                    userRole:userRole
                },
                success: function (response) {
                  $("#WaitingImg").remove();
                    if(response.check==401){
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
                            title: response.message
                          }).then(()=>{
                            window.location.reload();
                          })
                    }else if(response.check==403){
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
                            title: 'Tài khoản đã tồn tại'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }else if(response.check==200){
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
                            title: 'Đăng ký thành công'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }
                }
            })
        }
    });
}
