$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    addUser();
    UserRole();
});
function UserRole(){
    $('#addUserRolebtn').click(function (e) {
        var newUsRole = $("#newUserRole").val().trim();
        if(newUsRole!=''){
            $.ajax({
                url: 'http://127.0.0.1:3000/api/addUserRole',
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
                            // window.location.reload();
                          })
                    }
                }
            })
        }
})

}
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
            $.ajax({
                url: 'http://127.0.0.1:3000/api/register',
                type: "POST",
                data: {
                    username: username,
                    email:email,
                    userRole:userRole
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
