$(document).ready(function () {
    loadProd();
});
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
                            <img style="width:100%;height:auto;border-raidus:12%" src="http://127.0.0.1:3000/images/`+el["imagename"]+`" alt="">
                            </div>
                            `;
                        });
                        str+=`
                        </div>
                        `;

                    
                    });
                    $("#imagesedit").html(str);
                    $("#editProductMD").modal('show');
                }
            }
        });
    });
}