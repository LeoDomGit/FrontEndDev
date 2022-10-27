<link rel="stylesheet" href="admin/src/styles/dropdrag.css">
<link rel="stylesheet" href="admin/src/styles/dropdrag2.css">

<style>
  .waitingscreen{
    width:200px;
    margin: 0px auto;
  }
  .imageProds{
    width:250px;height:250px;border-radius:50%;cursor: pointer;
  } 
  .turnBtn{
    cursor: pointer;
  }
  .deleteImageIcon{
    transition: ease-in-out 2s;
    /* display: none; */
    position:absolute;
    top:45%;
    left:45%;
    color:white;
    text-align:center;
    font-weight:bolder;
    cursor:pointer;
    font-size:18px;
    background:rgb(191, 32, 32);
    width:30px;
    height:30px;
    border-radius:50%;
  }
 
</style>
@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="min-height-20px">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductMD">
  Thêm sản phẩm
</button>
{{-- ============================ --}}
<!-- Modal -->
<div class="modal fade" id="addProductMD" tabindex="-1" aria-labelledby="addProductMDLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductMDLabel">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
                  <div class="row">					
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" id="prodName" placeholder="Tên sản phẩm" />
                  </div>
                </div>    
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tóm tắt sản phẩm</label>
                    <input type="text" class="form-control" id="summary" placeholder="Tóm tắt sản phẩm" />
                  </div>
                </div> 
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Giá gốc</label>
                    <input type="number" class="form-control" id="prodPrice" placeholder="Nhập giá gốc" />
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Khuyến mãi</label>
                    <input type="number" class="form-control" id="discount" value="0" placeholder="Nhập tỷ lệ khuyến mãi" />
                  </div>
                </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select onchange="SelectBrandBySelectCate(this)" name="" id="prodTypeID" class="form-control">
                          <option value="">--Chọn danh mục--</option>
                          @foreach($cate as $item)
                          <option value="{{$item->idcate}}">{{$item->cateName}}</option>
                          @endforeach
                        </select>
                      </div>
                        </div>
                    <div class="col-md-4 ">
                    <div class="form-group">
                      <label>Thương hiệu</label>
                      <select disabled name="" id="brandID" class="form-control select-brand-by-prod">
                    </select>
                    </div>
                  </div>
                  <div class="col-4 ">
                    <div class="form-group">
                      <label>Giới tính</label>
                      <select name="" id="genderID" class="form-control">
                          <option value="0">Nam</option>
                          <option value="1">Nữ</option>
                    </select>
                    </div>
                  </div>
                  </div>
                      <div class="col-md-12">
                          <label >Nội dung</label>
                          <textarea class="form-control" id="desc" rows="4"></textarea>
                      </div>
                  </div>
                  <br>
  
            </form>
            <div class="row mb-3">
                <div class="col-8"></div>
                <div class="col-4">
                    <div style="width:99%" class="row">
                        <div class="col">
                            <button type="submit" id="btnAddProduct" class="btn btn-primary me-2 w-100">Thêm</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
  
  
  
{{-- End Modal 1 --}}
{{-- Modal 2 --}}

<div class="modal fade" id="addImageProductModal" tabindex="-1" aria-labelledby="addImageProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addImageProductModalLabel">Thêm hình ảnh sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="top">
            <p>Drag & drop image uploading</p>
            <button id="submitImageProd" type="button">Upload</button>
          </div>
          <div class="drag-area">
            <span class="visible">
            Drag & drop image here or
            <span class="select" role="button">Browse</span>
          </span>
          <span class="on-drop">Drop images here</span>
            <input name="file" type="file" class="file" multiple />
            <input type="hidden" name="" id="idProdEdit">
          </div>
    
          <!-- IMAGE PREVIEW CONTAINER -->
          <div class="container"></div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- End Modal 2 --}}

{{-- ========================== --}}

{{-- Modal 3 --}}
<!-- Modal -->
<div class="modal fade" id="editProductMD" tabindex="-1" aria-labelledby="editProductMDLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductMDLabel">Sửa sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">

            </div>
          </div>
          <form>
                <div class="row">					
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" id="prodNameedit" placeholder="Tên sản phẩm" />
                </div>
              </div>    
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Tóm tắt sản phẩm</label>
                  <input type="text" class="form-control" id="summaryedit" placeholder="Tóm tắt sản phẩm" />
                </div>
              </div>
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Giá</label>
                  <input type="number" class="form-control" id="priceEdit" placeholder="Nhập giá gốc" />
                </div>
              </div>
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Khuyến mãi</label>
                  <input type="number" class="form-control" id="discountEdit" placeholder="Nhập tỷ lệ giảm giá" />
                </div>
              </div> 
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <label>Loại sản phẩm</label>
                      <select name="" id="prodTypeIDedit" class="form-control">
                        @foreach($cate as $item)
                        <option value="{{$item->idcate}}">{{$item->cateName}}</option>
                        @endforeach
                      </select>
                    </div>
                      </div>
                  <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Thương hiệu</label>
                    <select name="" id="brandIDedit" class="form-control">
                    @foreach($brand as $item)
                    <option value="{{$item->idbrand}}">{{$item->brandname}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                    <div class="col-md-12">
                        <label >Nội dung</label>
                        <textarea class="form-control" id="descedit" rows="4"></textarea>
                    </div>
                    
                </div>
                <div class="row" id="imagesedit">

                </div>
                <br>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnEditProduct" class="btn btn-primary me-2">Sửa</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- endModal --}}

<div class="mt-3">
  <table class="data-table table hover multiple-select-row nowrap ">
    <thead>
      <tr>
        <th>Hình ảnh</th>
        <th class="table-plus datatable-nosort">Tên sản phẩm</th>
        <th>Thông tin sản phẩm</th>
        <th>Tình trạng</th>
        <th>Đơn giá</th>
        <th>Khuyến mãi</th>
        <th>Ngày tạo</th>
        <th>Tùy chỉnh</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item)
      <div class="modal fade" id="optionModal" tabindex="-1" aria-labelledby="optionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="optionModalLabel">Tùy chỉnh</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <button class="btn btn-warning" id="editProdBtn">Sửa</button> <button class="btn btn-danger" id="deleteProdBtn">Xóa</button> <button class="btn btn-success productdetailbtn" data-id="{{$item->idProd}}" >Chi tiết</button>         <button class="btn btn-warning" id="addMoreImages" data-toggle="modal" data-target="#addImageProductModal">Hình ảnh mới</button></div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
<!-- Modal -->
      <div class="modal fade" id="productDetail" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="productDetailLabel">Chi tiết sản phẩm </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="detailProductResult">

            </div>
          </div>
        </div>
      </div>
      <tr>
        <td><?php if($item->image!=null){?>
          <img style="width:170px;border-radius:50%" src="{{$item->image}}" alt="">
        <?php }?></td>
        <td class="table-plus">{{$item->prodName}}</td>
        <td>{{$item->summary}}</td>
        <td><button class="turnBtn <?php if($item->prodStatus==0){ echo "btn btn-secondary";}else{echo "btn btn-primary";}?> btn-sm" onclick="switchSP2({{$item->idProd}})" data-id="{{$item->idProd}}"><?php if($item->prodStatus==0){ echo "Đang đóng";}else{echo "Đang mở";}?></button></td>
        <td>{{number_format($item->price)}}</td>
        <td>{{$item->discount}}</td>
        <td>{{$item->prodCreate}}</td>
        <td><div class="mt-2">
          <button class="btn btn-warning" onclick="swip({{$item->idProd}})" data-toggle="modal" data-target="#optionModal">Tùy chỉnh</button>
          </div>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/addProd.js"></script>
<script src="admin/script/editProd.js"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="admin/ckfinder/ckfinder.js"></script>
<script>
     CKEDITOR.replace('desc', {
            height: 400,
        });
        CKEDITOR.replace('descedit', {
            height: 400,
        });
CKFinder.setupCKEditor();
function switchSP2(id)
{
    var idSP = id;
        $.ajax({
            type: "post",
            url: "https://api.trungthanhweb.com/api/switchSP",
            data: { idSP: idSP },
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
                    }else if(response.message=='emptystorage'){
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
                            title: "Sản phẩm có số lượng bằng 0 ",
                        });
                    }
                }
            }
        });
}
</script>
@endsection
