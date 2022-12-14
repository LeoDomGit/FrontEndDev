$(document).ready(function (){
    AjaxSetup();
    addSlider();
    deleteSlider();
    $("#color_mode").on("change", function () {
        colorModePreview(this);
    })
});
function chooseFileAdd(input) {
    const files = input.files
    const file = files[0];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png','image/webp'];
    if (!validImageTypes.includes(file['type'])) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderAdd').attr('src', 'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png');
        }
        reader.readAsDataURL(file);
        return false;
      }
    if (files && file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderAdd').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
}
function chooseFileEdit(input, id) {
    const files = input.files
    const file = files[0];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png','image/webp'];
    if (!validImageTypes.includes(file['type'])) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderEdit'+ id).attr('src', 'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png');
        }
        reader.readAsDataURL(file);
        return false;
      }
    if (files && file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fileSliderEdit' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
}
$('.fileImageEdit').change(function() {
    var id = $(this).data("id");
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
                title: 'B???n ch??a nh???p ti??u ?????!',
                text: 'Vui l??ng nh???p ti??u ????? tr?????c khi submit!',
              })
        }
        else if(!imageSlider){
            Swal.fire({
                icon: 'error',
                title: 'B???n ch??a ch???n ???nh!',
                text: 'Vui l??ng ch???n ???nh tr?????c khi submit!',
              })
        }
        else if
        (imageSlider.type != 'image/jpeg' && imageSlider.type != 'image/png' && imageSlider.type != 'image/gif' && imageSlider.type != 'image/webp'){
           
                Swal.fire({
                    icon: 'error',
                    title: 'Vui l??ng ch???n ???nh',
                    text: '( jpg, png, gif, webp)',
                    width:400,
                    height:300                   
                    }) 
        }
        else if(isStatus_D == false && isStatus_T == false){
            Swal.fire({
                icon: 'error',
                title: 'B???n ch??a ch???n tr???ng th??i!',
                text: 'Vui l??ng ch???n tr???ng th??i tr?????c khi submit!',
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
                   
                    if(response.status==203){
                        Swal.fire({
                            icon: 'error',
                            title: 'Ti??u ????? ???? t???n t???i!',
                            text: 'Vui l??ng ch???n ti??u ????? kh??c!',
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
                            title: '???? th??m th??nh c??ng'
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
            title: 'Ch???c ch???n x??a?',
            text: "Banner n??y s??? b??? x??a v?? s??? kh??ng hi???n th??? ??? trang ch???!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                var nameImage = $(this).data('id');
                $.ajax({
                    url: 'http://localhost:3000/api/deleteSlider',
                    type: 'post',
                    data: {   
                        nameImage: nameImage
                    },
                    success: (response) => {
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
                            title: 'X??a th??nh c??ng!'
                          }).then(()=>{
                            window.location.reload();
                          })
                    }
                }
                })
}
})
    })
}
$(".switches").click(function() {
    const formSubmit = $('form-update-status');
    formSubmit.submit();
        const id = $(this).attr('data-fpid');
        $.ajax({
            url: 'http://localhost:3000/api/allSlider/change-status',
            type: 'POST',
            data: {id: id},
            success: function(data) {
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
                title: 'C???p nh???t tr???ng th??i th??nh c??ng'
                })
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
    var titleEditSlider = $('#titleEditSlider'+ idSlider ).val().trim();
    var imageEdit = $("#imageEdit"+idSlider ).prop("files")[0];
    if(imageEdit){
        if(imageEdit.type != 'image/jpeg' && imageEdit.type != 'image/png' && imageEdit.type != 'image/gif' && imageEdit.type != 'image/webp'){
            Swal.fire({
                icon: 'error',
                title: 'Vui l??ng ch???n ???nh!',
                text: '( jpeg, png, gif, webp)',
              })
              return false;
        }
    }
    if(titleEditSlider ==''){
        Swal.fire({
            icon: 'error',
            title: 'B???n ch??a nh???p ti??u ?????!',
            text: 'Vui l??ng nh???p ti??u ????? tr?????c khi submit!',
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
                if(response.status==203){
                    Swal.fire({
                        icon: 'error',
                        title: response.msg,
                        text: 'Vui l??ng ch???n ti??u ????? kh??c!',
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
                    title: 'C???p nh???t th??nh c??ng'
                    }).then(()=>{
                    window.location.reload();
                    })
                }
            }
        })
    }
   
    
})