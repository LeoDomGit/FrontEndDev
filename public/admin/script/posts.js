function ChangeToSlugAddPost(el) {
    var slug;

    //Lấy text từ thẻ input title 
    slug = $(el).val();
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slugPostAdd').value = slug;
}

function ChangeToSlugEditPost(el) {
    var slug;
    var id = $(el).data("id");
    //Lấy text từ thẻ input title 
    slug = $(el).val();
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slugPostEdit' + id).value = slug;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview-image-cover-post-before-update').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL_2(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview-image-before-edit-posts' + id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageCoverPostAdd").change(function() {
    readURL(this);
});
$(".imagePostsEdit").change(function() {
    var id = $(this).data("id");
    readURL_2(this, id);
})






// //////////////////
// Thêm bài viết
// //////////////////


$(document).on("submit", "#form-add-post", function(e) {
    e.preventDefault();
    if ($('#titlePostAdd').val() == "") {
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
            title: 'Vui lòng nhập tiêu đề !'
        });
        return false;
    } else if ($('#tagsPostAdd').val() == "") {
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
            title: 'Nhập ít nhất một từ khóa liên quan !'
        });
        return false;
    } else if ($('#summaryPostAdd').val() == "") {
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
            title: 'Vui lòng nhập tóm tắt !'
        });
        return false;
    } else if ($('#imageCoverPostAdd').val() == "") {
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
            title: 'Vui lòng chọn ảnh bìa !'
        });
        return false;
    } else if ($('#selectCatePostAdd').val() == "") {
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
            title: 'Vui lòng chọn thể loại tin !'
        });
        return false;
    } else if ($('#contentPostAdd').val() == "") {
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
            title: 'Vui lòng nhập nội dung bài viết !'
        });
        return false;
    } else {
        AjaxSetup();
        $.ajax({
            url: "http://127.0.0.1:3000/api/addPosts",
            type: "post",
            data: new FormData($(this)[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
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
                        title: data.msg,
                    }).then(() => {
                        window.location.reload();
                    });
                } else if (data.status == 202) {
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
                        title: data.msg
                    });
                    return false;
                }
            }
        })
    }

})


// /////////////////
// Cập nhật bài viết
// //////////////////


$(document).on("submit", "#form-update-post", function(e) {
        e.preventDefault();
        if ($('.titlePostEdit').val() == "") {
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
                title: 'Vui lòng nhập tiêu đề !',
            });
            return false;
        } else if ($('.tagsPostEdit').val() == "") {
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
                title: 'Vui lòng nhập ít nhất 1 từ khóa liên quan !',
            });
            return false;
        } else if ($('.summaryPostEdit').val() == "") {
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
                title: 'Vui lòng nhập tóm tắt !',
            });
            return false;
        } else if ($('.contentPostEdit').val() == "") {
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
                title: 'Vui lòng nhập nội dung bài viết !',
            });
            return false;
        } else {
            AjaxSetup();
            $.ajax({
                url: "http://127.0.0.1:3000/api/updatePosts",
                type: "post",
                data: new FormData($(this)[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.status == 202) {
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
                            title: data.msg
                        });
                        return false;
                    } else if (data.status == 200) {
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
                            title: data.msg,
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                }
            })
        }
    })
    // ////////////////
    // Checkbox chọn tất cả
    // ////////////////
$(document).on("change", "#check-item-post-all", function(e) {
    e.preventDefault();
    $('.check-item-post-each-element').prop('checked', $(this).prop('checked'));
    $(".btn-move-item-to-trash").show();
    $('#count-item-move-to-trash').html($('input[class="check-item-post-each-element"]:checked').length)
    if ($('input[class="check-item-post-each-element"]:checked').length == 0) {
        $(".btn-move-item-to-trash").hide();
    }
})
$(document).on("change", ".check-item-post-each-element", function(e) {
    e.preventDefault();
    var countInput = $('.check-item-post-each-element').length;
    if ($('input[class="check-item-post-each-element"]:checked').length < countInput) {
        $('#check-item-post-all').prop("checked", false);
    } else if ($('input[class="check-item-post-each-element"]:checked').length == countInput) {
        $('#check-item-post-all').prop("checked", true);
    }
    $(".btn-move-item-to-trash").show();
    $('#count-item-move-to-trash').html($('input[class="check-item-post-each-element"]:checked').length)
    if ($('input[class="check-item-post-each-element"]:checked').length == 0) {
        $(".btn-move-item-to-trash").hide();
    }
})


// 

$(document).on("change", "#check-all-posts-in-trash", function(e) {
    e.preventDefault();
    $('.check-each-post-in-trash').prop("checked", $(this).prop("checked"));
    $(".btn-action-trash").show();
    $(".span-count-post-intrash").html($('input[class="check-each-post-in-trash"]:checked').length);
    if ($('input[class="check-each-post-in-trash"]:checked').length == 0) {
        $(".btn-action-trash").hide();
    }
})

$(document).on("change", ".check-each-post-in-trash", function(e) {
        e.preventDefault();
        var trashLenth = $('.check-each-post-in-trash').length;
        if ($('input[class="check-each-post-in-trash"]:checked').length < trashLenth) {
            $('#check-all-posts-in-trash').prop("checked", false);
        } else if ($('input[class="check-each-post-in-trash"]:checked').length == trashLenth) {
            $('#check-all-posts-in-trash').prop("checked", true);
        }
        $(".btn-action-trash").show();
        $(".span-count-post-intrash").html($('input[class="check-each-post-in-trash"]:checked').length);
        if ($('input[class="check-each-post-in-trash"]:checked').length == 0) {
            $(".btn-action-trash").hide();
        }
    })
    // ////////////////
    // Xóa mềm bài viết
    // ////////////////
$(document).on("click", ".btn-move-item-to-trash", function(e) {
        e.preventDefault();
        var arr = [];
        $('input[class="check-item-post-each-element"]:checked').each(function(index, value) {
            arr.push($(value).data("id"));
        })
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc?',
            text: "Bạn có muốn chuyển " + $('input[class="check-item-post-each-element"]:checked').length + " vào thùng rác ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                AjaxSetup();
                $.ajax({
                    url: "http://127.0.0.1:3000/api/deleteSoftPosts",
                    type: "post",
                    data: {
                        arr: arr,
                    },
                    success: function(data) {
                        if (data.status == 200) {
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
                                title: "Đã chuyển vào thùng rác thành công !",
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    })
    // //////////////////
    // Khoi phục bài viết theo mảng
    // ///////////////////
$(document).on("click", ".btn-restore-trash", function(e) {
        e.preventDefault();
        var arrId = [];
        $('input[class="check-each-post-in-trash"]:checked').each(function(index, value) {
            arrId.push($(value).data("id"))
        })
        AjaxSetup();
        $.ajax({
            url: "http://127.0.0.1:3000/api/restoreArrTrash",
            type: "post",
            data: {
                arr: arrId,
            },
            success: function(data) {
                if (data.status == 200) {
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
                        title: "Đã khôi phục thành công !",
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        })
    })
    // //////////////////
    // Xóa vĩnh viễn theo mảng

$(document).on("click", ".btn-delete-force-trash", function(e) {
        e.preventDefault();
        var arrId2 = [];
        $('input[class="check-each-post-in-trash"]:checked').each(function(index, value) {
            arrId2.push($(value).data("id"))
        })
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc?',
            text: "Bạn có chắc xóa vĩnh viễn " + $('input[class="check-each-post-in-trash"]:checked').length + " mục ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                AjaxSetup();
                $.ajax({
                    url: "http://127.0.0.1:3000/api/deleteForeceArrTrash",
                    type: "post",
                    data: {
                        arr: arrId2,
                    },
                    success: function(data) {
                        if (data.status == 200) {
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
                                title: "Đã xóa thành công !",
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    })
    // ////////////////////
    // Xóa mềm 1 bài viết
    // /////////////////////////

$(document).on("click", ".btn-move-single-post-to-trash", function(e) {
        e.preventDefault()
        var idPostMove = $(this).data("id");
        AjaxSetup();
        $.ajax({
            url: "http://127.0.0.1:3000/api/deleteSoftSinglePost",
            type: "post",
            data: {
                id: idPostMove,
            },
            success: function(data) {
                if (data.status == 200) {
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
                        title: "Đã chuyển thành công 1 mục vào thùng rác !",
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        })

    })
    //////////////////////////////
    // Khôi phục 1 bài viết
    // //////////////////////////

$(document).on("click", ".btn-restore-single-post-in-trash", function(e) {
        e.preventDefault();
        var idRestore = $(this).data("id");
        AjaxSetup();
        $.ajax({
            url: "http://127.0.0.1:3000/api/restoreSinglePost",
            type: "post",
            data: {
                id: idRestore,
            },
            success: function(data) {
                if (data.status == 200) {
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
                        title: "1 bài viết đã được khôi phục thành công !",
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        })
    })
    // ////////////////////////////
    // Xóa vĩnh viễn 1 bài viết
    // ///////////////////////////

$(document).on("click", ".btn-delete-force-single-post-in-trash", function(e) {
        e.preventDefault();
        var idDelete = $(this).data("id");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc?',
            text: "Bạn có chắc xóa vĩnh viễn bài viết này ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                AjaxSetup();
                $.ajax({
                    url: "http://127.0.0.1:3000/api/deleteForeSinglePost",
                    type: "post",
                    data: {
                        id: idDelete,
                    },
                    success: function(data) {
                        if (data.status == 200) {
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
                                title: "1 bài viết đã được xóa thành công !",
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    }
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    })
    // //////////////////////