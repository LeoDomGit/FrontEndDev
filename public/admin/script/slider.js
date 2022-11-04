$(document).ready(function (){
    AjaxSetup();
    addSlider();
    deleteSlider();
    $("#color_mode").on("change", function () {
        colorModePreview(this);
    })
});
function chooseFileAdd(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderAdd').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function chooseFileEdit(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderEdit' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('.fileImageEdit').change(function() {
    var id = $(this).data("id");
    console.log(id);
    chooseFileEdit(this, id);
})
function addSlider(){
    $('#form-add-slider').on('submit', function(e){
        e.preventDefault();
        var titleSlider = $('#titleSlider').val().trim();
        var imageSlider = $("#submit-file-slider").prop("files")[0];
        var isStatus_D = $('.status_D').prop('checked');
        var isStatus_T = $('.status_T').prop('checked');
         if(titleSlider == ''){
            Swal.fire({
                icon: 'error',
                title: 'Bạn chưa nhập tiêu đề!',
                text: 'Vui lòng nhập tiêu đề trước khi submit!',
              })
        }
        else if(!imageSlider){
            Swal.fire({
                icon: 'error',
                title: 'Bạn chưa chọn ảnh!',
                text: 'Vui lòng chọn ảnh trước khi submit!',
              })
        }
        else if
        (imageSlider.type != 'image/jpeg' && imageSlider.type != 'image/png' && imageSlider.type != 'image/gif' && imageSlider.type != 'image/webp'){
           
                Swal.fire({
                    icon: 'error',
                    title: 'Vui lòng chọn ảnh',
                    text: '( jpg, png, gif, webp)',
                    width:400,
                    height:300                   
                    }) 
        }
        else if(isStatus_D == false && isStatus_T == false){
            Swal.fire({
                icon: 'error',
                title: 'Bạn chưa chọn trạng thái!',
                text: 'Vui lòng chọn trạng thái trước khi submit!',
              })
        }else{
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "http://localhost:3000/api/addSlider",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (response) => {
                   
                    if(response.status==502){
                        Swal.fire({
                            icon: 'error',
                            title: 'Tiêu đề trùng!',
                            text: 'Vui lòng chọn tiêu đề khác!',
                          })
                    }
                    if(response.check==true){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
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
                    }
                }
            })
        }
        
    })
}
function deleteSlider(){
    $('.deleteSlider').click(function () {
        Swal.fire({
            title: 'Chắc chắn xóa?',
            text: "Banner này sẽ bị xóa và sẽ không hiển thị ở trang chủ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Xóa thành công!',
                    showConfirmButton: false,
                    timer: 500
                })
                var nameImage = $(this).data('id');
                $.ajax({
                    url: 'http://localhost:3000/api/deleteSlider',
                    type: 'post',
                    data: {
                        
                        nameImage: nameImage
                    }
                }).done(function () {
                    window.location.reload();
                    
                })
            }
})
    })
}

$(".switches").click(function() {
    const formSubmit = $('form-update-status');
    formSubmit.submit();
        const id = $(this).attr('data-fpid');
        console.log(id);
        $.ajax({
            url: 'http://localhost:3000/api/allSlider/change-status',
            type: 'POST',
            data: {id: id},
            success: function(data) {
                console.log(data);
            }
        })
   
});
function colorModePreview(ele) {
    if($(ele).prop("checked") == true){
        $('body').addClass('dark-preview');
        $('body').removeClass('white-preview');
    }
    else if($(ele).prop("checked") == false){
        $('body').addClass('white-preview');
        $('body').removeClass('dark-preview');
    }
}
//edit slider
$(document).on("submit", "#form-edit-slider", function(e) {
    e.preventDefault();
    var idSlider = $(this).attr('data-id');
    var formData = new FormData(this);
    console.log(formData)
    var titleEditSlider = $('#titleEditSlider'+ idSlider ).val().trim();
    var imageEdit = $("#imageEdit"+idSlider ).prop("files")[0];
    if(imageEdit){
        if(imageEdit.type != 'image/jpeg' && imageEdit.type != 'image/png' && imageEdit.type != 'image/gif' && imageEdit.type != 'image/webp'){
            Swal.fire({
                icon: 'error',
                title: 'Vui lòng chọn ảnh!',
                text: '( jpeg, png, gif, webp)',
              })
              return false;
        }
    }
    if(titleEditSlider ==''){
        Swal.fire({
            icon: 'error',
            title: 'Bạn chưa nhập tiêu đề!',
            text: 'Vui lòng nhập tiêu đề trước khi submit!',
        })
        return false;
    }
    else{
        $.ajax({
            url: 'http://localhost:3000/api/editSlider',
            type: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success:(response) => {
                console.log(response);
                if(response.status==203){
                    Swal.fire({
                        icon: 'error',
                        title: response.msg,
                        text: 'Vui lòng chọn tiêu đề khác!',
                    })
                }
                if(response.status==200){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    
                    Toast.fire({
                    icon: 'success',
                    title: 'Cập nhật thành công'
                    }).then(()=>{
                    window.location.reload();
                    })
                }
            }
        })
    }
   
    
})