$("#btnAddImageProduct").hide();
$(document).ready(function () {
    addProduct();
});
function addProduct(){
    $("#btnAddProduct").click(function (e) { 
        e.preventDefault();
        var prodName = $("#prodName").val().trim();
        var summary = $("#summary").val().trim();
        var prodTypeID = $("#prodTypeID :selected").val();
        var brandID = $("#brandID :selected").val();
        var desc= CKEDITOR.instances['desc'].getData();
        // console.log(prodTypeID,brandID);
        if(prodName==''){
            Swal.fire({
                icon: 'error',
                showConfirmButton: false,
                text: 'Thiếu tên sản phẩm!',
              })
        }else if(summary==''){
            Swal.fire({
                icon: 'error',
                showConfirmButton: false,
                text: 'Thiếu tóm tắt sản phẩm!',
              })
        }
        else if(isNaN(prodTypeID)==true||isNaN(brandID)==true){
            Swal.fire({
                icon: 'error',
                showConfirmButton: false,
                text: 'Dữ liệu không hợp lệ!',
            })
        }else if(desc==''){
            Swal.fire({
                icon: 'error',
                showConfirmButton: false,
                text: 'Thiếu nội dung sản phẩm!',
            })
        }else{
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:3000/api/addProduct",
                data: {
                    prodName:prodName,
                    summary:summary,
                    prodTypeID:prodTypeID,
                    brandID:brandID,
                    desc:desc
                },
                dataType: "JSON",
                success: function (response) {
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
                            title: 'Đã thêm thành công'
                        }).then(() => {
                            var idProd = response.id;
                            $("#btnAddImageProduct").show();
                            console.log(idProd);
                        })
                    } else {
                        if (response.message == 'rejected') {
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
                        } else if (response.message == 'exist') {
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
                                title: 'Sản phẩm đã tồn tại'
                            });
                        }
                    }
                }
            });
        }
        // $("#btnAddImageProduct").show();
    });
}