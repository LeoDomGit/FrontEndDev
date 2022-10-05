function ajaxSetup() {
    return $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
$(document).ready(function() {
    loadProd();
    addMoreimg();
});

function loadProd() {
    $('.editBtn').click(function(e) {
        e.preventDefault();
        var idProd = $(this).attr('data-id');
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:3000/api/productDetail",
            data: {
                idProd: idProd
            },
            dataType: "JSON",
            success: function(response) {
                if (response.check == true) {
                    var str = ``;
                    response.result.forEach(element => {
                        var idProd = element['idProd'];
                        var prodName = element['prodName'];
                        var status = element['prodStatus'];
                        var created_at = element['prodCreate'];
                        var updated_at = element['prodUpdate'];
                        var summary = element['summary'];
                        var cateName = element['cateName'];
                        var brandname = element['brandname'];
                        var prodBrandId = element['prodBrandId'];
                        var prodCateId = element['prodCateId'];
                        var content = element['content'];
                        $("#prodNameedit").val(prodName);
                        $("#summaryedit").val(summary);
                        $('#prodTypeIDedit option[value=' + prodCateId + ']').prop("selected", true);
                        $('#brandIDedit option[value=' + prodBrandId + ']').prop("selected", true);
                        CKEDITOR.instances['descedit'].setData(content);

                        str += `
                            <div style="width:98%;margin:0px auto" class="row mt-2">
                        `;
                        response.images.forEach(el => {
                            str += `
                            <div class="col-3 mb-2 imageProds">
                            <p  onclick="deleteImage(` + el['imagename'] + `)" class="deleteImageIcon">x</p>
                            <img style="width:300px;height:300px;border-radius:50%" src="http://127.0.0.1:3000/images/` + el["imagename"] + `" alt="">
                            </div>
                            `;
                        });
                        str += `
                        </div>
                        `;


                    });
                    $("#imagesedit").html(str);
                    $("#editProductMD").modal('show');
                }
            }
        });
    });

    function deleteImage(x) {
        alert(x);
    }
}

function addMoreimg() {
    var drop = $("input");
    drop.on('dragenter', function(e) {
        $(".drop").css({
            "border": "4px dashed #09f",
            "background": "rgba(0, 153, 255, .05)"
        });
        $(".cont").css({
            "color": "#09f"
        });
    }).on('dragleave dragend mouseout drop', function(e) {
        $(".drop").css({
            "border": "3px dashed #DADFE3",
            "background": "transparent"
        });
        $(".cont").css({
            "color": "#8E99A5"
        });
    });

}

// Code xử lý thêm ảnh sản phẩm đã có rồi
$(document).on('submit', '#form-add-gallery', function(e) {
    e.preventDefault();
    $(".btnaddmoreimagebtn").prop('disabled', true);
    $(".btnaddmoreimagebtn").html('Đang xử lý...');
    ajaxSetup();
    $.ajax({
        url: "http://127.0.0.1:3000/api/updateProductGaller",
        type: "post",
        data: new FormData($(this)[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            if (response.check == true) {
                $(".btnaddmoreimagebtn").prop('disabled', false);
                $(".btnaddmoreimagebtn").html('Lưu');
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
                    title: 'Đăng hình ảnh thành công'
                }).then(() => {
                    window.location.reload();
                })
            } else {
                $(".btnaddmoreimagebtn").prop('disabled', false);
                $(".btnaddmoreimagebtn").html('Lưu');
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
                    title: 'Đăng hình ảnh không thành công'
                })
            }
        }
    });
});
// Hiện hình ảnh trước khi upload
$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('.files').on('change', function() {
        var idCurrent = $(this).data('id');
        imagesPreview(this, '#list' + idCurrent);
    });
});
// code xử lý cập nhật sản phẩm
$(document).on("submit", "#form-edit-prod", function(e) {
    e.preventDefault();
    ajaxSetup();
    $.ajax({
        url: "http://127.0.0.1:3000/api/updateProduct",
        type: "post",
        data: $(this).serialize(),
        success: function(data) {
            if (data.status == 200) {
                Swal.fire({
                    icon: "success",
                    showConfirmButton: false,
                    text: data.msg,
                });
                setInterval(() => {
                    window.location.reload();
                }, 1500);
            } else if (data.status == 202) {
                Swal.fire({
                    icon: "error",
                    showConfirmButton: false,
                    text: data.msg,
                });
            } else if (data.status == 204) {
                $.each(data.msg, function(index, value) {
                    if (index == 'brandProd') {
                        $('select[name="' + index + '"]').addClass("is-invalid");
                        ('#' + index).html(value);
                    }

                    $('input[name="' + index + '"]').addClass("is-invalid");
                    $('input[name="' + index + '"]').next().html(value);
                })
            }
        }
    })
})