$(document).ready(function () {
    selectProduct();
    ColorPick();
    submitColor();
    getSingleStorage();
});

// ==============================

function getSingleStorage(){
    $("#ProductSelect2").change(function (e) { 
        e.preventDefault();
        var idProd = $("#ProductSelect2 option:selected").val();
        $.ajax({
            type: "post",
            url: "https://api.trungthanhweb.com/api/selectColorProduct",
            data: {idProd:idProd},
            dataType: "JSON",
            success: function (response) {
                if(response.check==true){
                    var str = ``;
                    response.colors.forEach(el => {
                        if(el['colorname']==null||el['colorname']==''){
                            if(el['quantity']==0){
                                str+=`
                                <div class="row p-3">
                                <div class="col-1">
                                    <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </div>
                                <div class="col-4">
                                <input type="text" class="form-control colornameInpt" data-id="`+el["idStorage"]+`" placeholder="Tên màu sắc"></input>
                                </div>
                                <div class="col-2">
                                    <h5 style="padding-top:11%;font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </div>
                                <div class="col-2">
                                <h5 style="padding-top:11%;font-size:17px">Số lượng: `+el["quantity"]+`</h5>
                                </div>
                                <div class="col-3">
                                <input type="number" class="form-control" placeholder="Số lượng"></input>
                                </div>
                              </div>
                                `;
                            }

                        }else{
                            if(el['quantity']==0){
                                str+=`
                                <div class="row p-3">
                                <div class="col-1">
                                    <div style="background-color:`+el["path"]+`;width:40px;height:40px;border-radius:50%"></div>
                                </div>
                                <div class="col-4">
                                <h5 style="padding-top:4%;font-size:17px">Màu: `+el["colorname"]+`</h5>
                                </div>
                                <div class="col-2">
                                    <h5 style="padding-top:11%;font-size:17px">Size: `+el["sizeName"]+`</h5>
                                </div>
                                <div class="col-2">
                                <h5 style="padding-top:11%;font-size:17px">Số lượng: `+el["quantity"]+`</h5>
                                </div>
                                <div class="col-3">
                                <input type="number" class="form-control" placeholder="Số lượng"></input>
                                </div>
                              </div>
                                `;
                            }
                        }
                    });

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
