$("#btnAddImageProduct").hide();
var files = [];
$(document).ready(function() {
    idProd = addProduct();
    (dragArea = document.querySelector(".drag-area")),
    (input = document.querySelector(".drag-area input")),
    (button = document.querySelector(".card button")),
    (select = document.querySelector(".drag-area .select")),
    (container = document.querySelector(".container"));

    /** CLICK LISTENER */
    select.addEventListener("click", () => input.click());

    /* INPUT CHANGE EVENT */
    input.addEventListener("change", () => {
        let file = input.files;

        // if user select no image
        if (file.length == 0) return;

        for (let i = 0; i < file.length; i++) {
            if (file[i].type.split("/")[0] != "image") continue;
            if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
        }

        showImages();
    });

    /** SHOW IMAGES */
    function showImages() {
        container.innerHTML = files.reduce((prev, curr, index) => {
            return `${prev}
                                            <div class="image">
                                                <span onclick="delImage(${index})">&times;</span>
                                                <img src="${URL.createObjectURL(
                                                    curr
                                                )}" />
                                            </div>`;
        }, "");
    }

    /* DELETE IMAGE */

    /* DRAG & DROP */
    dragArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dragArea.classList.add("dragover");
    });

    /* DRAG LEAVE */
    dragArea.addEventListener("dragleave", (e) => {
        e.preventDefault();
        dragArea.classList.remove("dragover");
    });

    /* DROP EVENT */
    dragArea.addEventListener("drop", (e) => {
        e.preventDefault();
        dragArea.classList.remove("dragover");

        let file = e.dataTransfer.files;
        for (let i = 0; i < file.length; i++) {
            /** Check selected file is image */
            if (file[i].type.split("/")[0] != "image") continue;

            if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
        }
        showImages();
    });


});

function delImage(index) {
    files.splice(index, 1);
    showImages();
}
// =================================
function showImages() {
    container.innerHTML = files.reduce((prev, curr, index) => {
        return `${prev}
                                        <div class="image">
                                            <span onclick="delImage(${index})">&times;</span>
                                            <img src="${URL.createObjectURL(
                                                curr
                                            )}" />
                                        </div>`;
    }, "");
}
// =============================
function addProduct() {
    $("#btnAddProduct").click(function(e) {
        e.preventDefault();
        var prodName = $("#prodName").val().trim();
        var summary = $("#summary").val().trim();
        var prodTypeID = $("#prodTypeID :selected").val();
        var brandID = $("#brandID :selected").val();
        var desc = CKEDITOR.instances["desc"].getData();
        // console.log(prodTypeID,brandID);
        if (prodName == "") {
            Swal.fire({
                icon: "error",
                showConfirmButton: false,
                text: "Thiếu tên sản phẩm!",
            });
        } else if (summary == "") {
            Swal.fire({
                icon: "error",
                showConfirmButton: false,
                text: "Thiếu tóm tắt sản phẩm!",
            });
        } else if (isNaN(prodTypeID) == true || isNaN(brandID) == true) {
            Swal.fire({
                icon: "error",
                showConfirmButton: false,
                text: "Dữ liệu không hợp lệ!",
            });
        } else if (desc == "") {
            Swal.fire({
                icon: "error",
                showConfirmButton: false,
                text: "Thiếu nội dung sản phẩm!",
            });
        } else {
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addProduct",
                data: {
                    prodName: prodName,
                    summary: summary,
                    prodTypeID: prodTypeID,
                    brandID: brandID,
                    desc: desc,
                },
                dataType: "JSON",
                success: function(response) {
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
                            title: "Đã thêm thành công",
                        }).then(() => {
                            var idProd = response.id;
                            $("#btnAddImageProduct").show();
                            $("#submitImageProd").click(function(e) {
                                e.preventDefault();
                                if (files.length != 0) {
                                    if( $("#idProdEdit").val()==''||$("#idProdEdit").val()==' '||$("#idProdEdit").val()==undefined){
                                        var formData = new FormData();
                                    var totalfiles = files.length;
                                    formData.append('idProd', idProd);
                                    for (let index = 0; index < files.length; index++) {
                                        formData.append('files[]', files[index]);
                                    }
                                    $.ajax({
                                        type: "post",
                                        url: "http://127.0.0.1:3000/api/addProdGallery",
                                        data: formData,
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        dataType: "JSON",
                                        success: function(response) {
                                            if (response.check == true) {
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
                                                })
                                            } else {
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
                                    }
                                    
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        showConfirmButton: false,
                                        text: "Chưa nhận được file hình ảnh ",
                                    });
                                }
                            });
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
                        } else if (response.message == "exist") {
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
                                title: "Sản phẩm đã tồn tại",
                            });
                        }
                    }
                },
            });
        }

    });
}

function SelectBrandBySelectCate(el) {
    var valueCate = $(el).val();
    if (valueCate != "") {
        $(".select-brand-by-prod").prop("disabled", false);
    } else {
        $(".select-brand-by-prod").prop("disabled", true);
        $(".select-brand-by-prod").html("");
        return false;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://127.0.0.1:3000/api/GetBRandByCate",
        type: "post",
        data: {
            id: valueCate
        },
        success: function(data) {
            $(".select-brand-by-prod").html(data);
        }
    })
}