$(document).ready(function () {
    selectProduct();
    ColorPick();
    submitColor();
});
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

function selectProduct(){
        $('#ProductSelect').change(function (e) { 
            e.preventDefault();
            var idProd = $("#ProductSelect option:selected").val();
            $.ajax({
                type: "post",
                url: "https://api.trungthanhweb.com/api/colorProduct",
                data: {idProd:idProd},
                dataType: "JSON",
                success: function (response) {
                    if(response.check==true){
                        if(response.state==0){
                            $("#ResultColorModal").modal('show');
                        }
                    }
                }
            });
            
        });
}
