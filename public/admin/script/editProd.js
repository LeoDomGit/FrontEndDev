function ajaxSetup() {
    return $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
$(document).ready(function() {
    loadProd();
    addMoreImage();
    switchSP();
});
function switchSP(){
  $('.turnBtn').click(function (e) { 
    e.preventDefault();
    var idSP = $(this).attr('data-id');
    $.ajax({
      type: "post",
      url: "http://127.0.0.1:3000/api/switchSP",
      data: {idSP:idSP},
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
function addMoreImage(){
  $('.addMoreImages').click(function (e) { 
    e.preventDefault();
    var idProd= $(this).attr('data-id');
    $("#idProdEdit").val(idProd);
    $('#submitImageProd').click(function (e) { 
      e.preventDefault();
      if(idProd!=''&&idProd!=' '&&idProd!=undefined && files.length>0){
          var formData = new FormData();
          formData.append('idProd', idProd);
        for (let index = 0; index < files.length; index++) {
          formData.append('files[]', files[index]);
        }
        $.ajax({
          type: "post",
          url: "http://127.0.0.1:3000/api/updateProductGaller",
          data: formData,
          contentType: false,
          cache: false,
          processData: false,
          dataType: "JSON",
          success: function (response) {
              if(response.check==false){
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
                    title: 'Dữ liệu không hợp lệ !'
                  })
                }
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
                  icon: 'success',
                  title: 'Đã cập nhật thành công !'
                }).then(()=>{
                  window.location.reload();
                });
              }
          }
          
        }); 
      
      }
    });
  });
}
function loadProd(){
  $('.editBtn').click(function (e) { 
      e.preventDefault();
      var idProd = $(this).attr('data-id');
      $.ajax({
          type: "post",
          url: "http://127.0.0.1:3000/api/productDetail",
          data: {
              idProd:idProd
          },
          dataType: "JSON",
          success: function (response) {
              if(response.check==true){
                  var str=``;
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
                      $('#prodTypeIDedit option[value='+prodCateId+']').prop("selected", true);
                      $('#brandIDedit option[value='+prodBrandId+']').prop("selected", true);
                      CKEDITOR.instances['descedit'].setData(content);

                      str+=`
                          <div style="width:98%;margin:0px auto" class="row mt-2">
                      `;
                      response.images.forEach(el => {
                          str+=`
                          <div class="col-3">
                          <p data-id="`+el["imagename"]+`" class="deleteImageIcon">x</p>
                          <img class="imageProds" src="http://127.0.0.1:3000/images/`+el["imagename"]+`" alt="">
                          </div>
                          `;
                      });
                      str+=`
                      </div>
                      `;
                  });
                  $("#imagesedit").html(str);
                  $("#editProductMD").modal('show');
                  $("#btnEditProduct").click(function (e) { 
                    e.preventDefault();
                    var id = idProd;
                    var prodNameedit = $("#prodNameedit").val().trim();
                    var summaryedit = $("#summaryedit").val().trim();
                    var prodTypeIDedit = $("#prodTypeIDedit :selected").val();
                    var brandIDedit = $("#brandIDedit :selected").val().trim();
                    var descedit = CKEDITOR.instances["descedit"].getData();
                    if (prodNameedit == "") {
                      Swal.fire({
                          icon: "error",
                          showConfirmButton: false,
                          text: "Thiếu tên sản phẩm!",
                      });
                  } else if (summaryedit == "") {
                      Swal.fire({
                          icon: "error",
                          showConfirmButton: false,
                          text: "Thiếu tóm tắt sản phẩm!",
                      });
                  } else if (isNaN(prodTypeIDedit) == true || isNaN(brandIDedit) == true) {
                      Swal.fire({
                          icon: "error",
                          showConfirmButton: false,
                          text: "Dữ liệu không hợp lệ!",
                      });
                  } else if (descedit == "") {
                      Swal.fire({
                          icon: "error",
                          showConfirmButton: false,
                          text: "Thiếu nội dung sản phẩm!",
                      });
                  } else {
                    $.ajax({
                      type: "post",
                      url: "http://127.0.0.1:3000/api/editProduct",
                      data: {
                          id:id,
                          prodName: prodNameedit,
                          summary: summaryedit,
                          prodTypeID: prodTypeIDedit,
                          brandID: brandIDedit,
                          desc: descedit,
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
              $('.deleteImageIcon').click(function (e) { 
                e.preventDefault();
                let imageName = $(this).attr('data-id');
                Swal.fire({
                  title: 'Bạn muốn xóa ảnh ?',
                  showDenyButton: true,
                  showCancelButton: true,
                  confirmButtonText: 'Đúng',
                  denyButtonText: `Không !`,
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                    $.ajax({
                      type: "post",
                      url: "http://127.0.0.1:3000/api/deleteImage",
                      data: {
                        imageName:imageName
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
                            title: 'Đã xóa ảnh thành công'
                          }).then(()=>{
                            window.location.reload();
                          });
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
                            title: 'Xóa ảnh không thành công'
                          })
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
                      title: 'Không xóa !'
                    })
                  }
                })
              });
          }
      });
  });
}
