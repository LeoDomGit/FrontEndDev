$(document).ready(function () {
    selectProduct();
    ColorPick();
    submitColor();
    getSingleStorage();
    getSingleStorage2();
    deleteStorage();
});
var idProd ='';
function deleteStorage(){
    $('.deleteStorage').click(function (e) { 
        e.preventDefault();
        var idStorage = $(this).attr('data-id');
                $.ajax({
            type: "post",
            url: "https://api.trungthanhweb.com/api/deleteStorage",
            data: {
                idStorage:idStorage,
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
                        title: 'Ohhhh ! Dữ liệu có vẫn đề '
                      })
                }
            }
        });
    });
}
function getSingle3(id){
    idProd= id
        $("#StorageTable").html('');
        selectsingle();
}
function getSingleStorage2(){
    $('.viewProductBtn').click(function (e) { 
        e.preventDefault();
        idProd= $(this).attr('data-id');
        $("#StorageTable").html('');
        selectsingle();
    });
}
function selectsingle(){
    $.ajax({
        type: "post",
        url: "https://api.trungthanhweb.com/api/selectColorProduct",
        data: {idProd:idProd},
        dataType: "JSON",
        success: function (response) {
            if(response.check==true){
                var str = ``;
                str+=`<table class="table">`;
                response.colors.forEach(el => {
                    if(el['colorname']==null||el['colorname']==''){
                        if(el['quantity']==0){
                            str+=`
                            <tr>
                                <td>
                                <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                <input type="text" class="form-control colornameInpt" data-id="`+el["idStorage"]+`" placeholder="Tên màu sắc"></input>
                                </td>
                                <td>
                                 <h5 >Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }else{
                            str+=`
                            <tr>
                                <td>
                                <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                 <input type="text" class="form-control colornameInpt" data-id="`+el["idStorage"]+`" placeholder="Tên màu sắc"></input>
                                </td>
                                <td>
                                 <h5>Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }

                    }else{
                        if(el['quantity']==0){
                            str+=`
                            <tr>
                                <td>
<div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
<h5 style="font-size:17px;cursor:pointer" onclick="editColorName('`+el["path"]+`')">Màu: <span style="margin-left:3%">`+el["colorname"]+`</span></h5>                                </td>
                                <td>
                                 <h5 style="font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="font-size:17px;cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }else{
                            str+=`
                            <tr>
                                <td>
                                    <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                    <h5 style="font-size:17px;cursor:pointer" onclick="editColorName('`+el["path"]+`')">Màu: <span style="margin-left:3%">`+el["colorname"]+`</span></h5></td>
                                <td>
                                    <h5 style="font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="font-size:17px;cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }
                    }
                });
               str+=`</table>`;
                $('#resultColors').css("background-color","#e6e6e6");
                $("#resultColors").html(str);
            }
             $('.colornameInpt').keyup(function (e) { 
                        e.preventDefault();
                        var newName = $(this).val();
                        if(e.keyCode===13){
                            newName= newName.trim();
                            var idStrorage= $(this).attr('data-id');
                            if(newName!=''&& isNaN(idStrorage)==false){
                                $.ajax({
                                    type: "post",
                                    url: "https://api.trungthanhweb.com/api/updateNameColor",
                                    data: {
                                        colorName:newName,
                                        idStrorage:idStrorage
                                    },
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
                                                    title: 'Dữ liệu không hợp lệ '
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
                                                title: 'Đã thêm thành công'
                                              }).then(()=>{
                                                window.location.reload();
                                              });
                                        }
                                    }
                                   });
                            }
    
                        }
                    });
        }
    });
}
function editQuantity(x){
    var id= x;
    $("#editQuantityModal").modal('show');
    $('#newquantity').keyup(function (e) { 
        var qty = $("#newquantity").val().trim();
        if(e.keyCode===13){
            if(qty!=''){
                $.ajax({
                    type: "post",
                    url: "https://api.trungthanhweb.com/api/updateQuantity",
                    data: {
                        idStorage:id,
                        qty:qty
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#newquantity').val('');
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
                                title: 'Thêm số lượng thành công'
                              }).then(()=>{
                                if(response.idProd){
                                idProd= response.idProd;
                                $('#editQuantityModal').modal('hide');
                                selectsingle(idProd);
                                idProd='';
                                id=''
                                }
                                
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
                                title: 'Dữ liệu không hợp lệ'
                              })
                        }
                    }
                });
            }
        }
        
    });
}

// ==============================

function editColorName(x){
    var i =x ;
    var color='<div style="background-color:'+i+';width:40px;height:40px;border-radius:50%"></div>';
    $("#colorar").html(color);
    $('#colorEditModal').modal('show');
    $('#newColorName').keyup(function (e) { 
        var colorName = $("#newColorName").val().trim();
        if(e.keyCode===13){
            if(colorName!=''){
                Swal.fire({
                    icon:'question',
                    text: 'Bạn muốn lưu tên mới ?',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Lưu',
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "https://api.trungthanhweb.com/api/editColorName",
                            data: {
                                path:i,
                                colorName:colorName,
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
                                        title: 'Đã thay đổi thành công'
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
                                        title: 'Dữ liệu không hợp lệ'
                                      })
                                }
                            }
                        });
                    }
                  })
            }
        }
    });
}
// ==============================

function getSingleStorage(){
    $("#ProductSelect2").change(function (e) { 
        e.preventDefault();
        var idProd = $("#ProductSelect2 option:selected").val();
        if(idProd==0){
            window.location.reload();
        }else{
            $("#StorageTable").html('');
            $.ajax({
                type: "post",
                url: "https://api.trungthanhweb.com/api/selectColorProduct",
                data: {idProd:idProd},
                dataType: "JSON",
                success: function (response) {
                    if(response.check==true){
                           var str = ``;
                str+=`<table class="table">`;
                response.colors.forEach(el => {
                    if(el['colorname']==null||el['colorname']==''){
                        if(el['quantity']==0){
                            str+=`
                            <tr>
                                <td>
                                <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                <input type="text" class="form-control colornameInpt" data-id="`+el["idStorage"]+`" placeholder="Tên màu sắc"></input>
                                </td>
                                <td>
                                 <h5 >Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }else{
                            str+=`
                            <tr>
                                <td>
                                <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                 <input type="text" class="form-control colornameInpt" data-id="`+el["idStorage"]+`" placeholder="Tên màu sắc"></input>
                                </td>
                                <td>
                                 <h5>Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }

                    }else{
                        if(el['quantity']==0){
                            str+=`
                            <tr>
                                <td>
<div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
<h5 style="font-size:17px;cursor:pointer" onclick="editColorName('`+el["path"]+`')">Màu: <span style="margin-left:3%">`+el["colorname"]+`</span></h5>                                </td>
                                <td>
                                 <h5 style="font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="font-size:17px;cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }else{
                            str+=`
                            <tr>
                                <td>
                                    <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </td>
                                <td>
                                    <h5 style="font-size:17px;cursor:pointer" onclick="editColorName('`+el["path"]+`')">Màu: <span style="margin-left:3%">`+el["colorname"]+`</span></h5></td>
                                <td>
                                    <h5 style="font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </td>
                                <td>
                                 <h5 style="font-size:17px;cursor:pointer" onclick="editQuantity(`+el["idStorage"]+`)">Số lượng: `+el["quantity"]+`</h5>
                                </td>
                            </tr>
                            `;
                        }
                    }
                });
                   str+=`</table>`;
    
                        $('#resultColors').css("background-color","#e6e6e6");
                        $("#resultColors").html(str);
                    }
    
                    $('.colornameInpt').keyup(function (e) { 
                        e.preventDefault();
                        var newName = $(this).val();
                        if(e.keyCode===13){
                            newName= newName.trim();
                            var idStrorage= $(this).attr('data-id');
                            if(newName!=''&& isNaN(idStrorage)==false){
                                $.ajax({
                                    type: "post",
                                    url: "https://api.trungthanhweb.com/api/updateNameColor",
                                    data: {
                                        colorName:newName,
                                        idStrorage:idStrorage
                                    },
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
                                                    title: 'Dữ liệu không hợp lệ '
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
                                                title: 'Đã thêm thành công'
                                              }).then(()=>{
                                                window.location.reload();
                                              });
                                        }
                                    }
                                   });
                            }
    
                        }
                    });
                }
            });
        }

    });
}

// ===========================

var colorArr = [];

function submitColor(){
    $("#saveColorProductBtn").click(function (e) { 
        e.preventDefault();
        var idProd = $("#ProductSelect option:selected").val();
        var colors = JSON.stringify(colorArr);
        console.log(colors);
        $.ajax({
            type: "post",
            url: "https://api.trungthanhweb.com/api/saveStorage",
            data: {
                idProd:idProd,
                colors:colors,
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
                        title: 'Ohhhh ! Dữ liệu có vẫn đề '
                      })
                }
            }
        });
    });
}

// ===========================

function ColorPick(){
        colorArr = [];
        $('#addColorBtn').click(function (e) { 
            e.preventDefault();
            var ColorPath = $("#colorPath").val();  
            var check = true;
            for (let i = 0; i < colorArr.length; i++) {
                const element = colorArr[i];
                if(element==ColorPath){
                    check = false;
                    break;
                }
            }
            if(check==true){
                colorArr.push(ColorPath);
            }
            showColor()
        });
    }
 // ===========================
function showColor(){
        var str= ``;
        colorArr.forEach(el => {
            str+=`
            <div class="col-2">
            <p class="removeColor" data-id="`+el+`" style="padding:20px 20px;border-radius:50%;background-color:`+el+`"></p><br><br><br>
            </div>
            `;
        });
        $("#arrColor").html(str);
        $('.removeColor').click(function (e) { 
            e.preventDefault();
            var colorPath=$(this).attr('data-id');
            var ColorArr2=[];
                colorArr.forEach(el => {
                    if(el!=colorPath){
                            ColorArr2.push(el);
                    }
                });
                colorArr=ColorArr2;
                var str= ``;
                colorArr.forEach(el => {
                str+=`
                    <div class="col-2">
                    <p class="removeColor" data-id="`+el+`" style="padding:20px 20px;border-radius:50%;background-color:`+el+`"></p><br><br><br>
                    </div>
                `;
                });
                showColor();

        });
}
// ===========================
function selectProduct(){
        $('#ProductSelect').change(function (e) { 
            e.preventDefault();
            var idProd = $("#ProductSelect option:selected").val();
            $("#ResultColorModal").modal('show');
            // $.ajax({
            //     type: "post",
            //     url: "https://api.trungthanhweb.com/api/colorProduct",
            //     data: {idProd:idProd},
            //     dataType: "JSON",
            //     success: function (response) {
            //         if(response.check==true){
            //             if(response.state==0){
            //                 $("#ResultColorModal").modal('show');
            //             }
            //         }
            //     }
            // });
        });
}
