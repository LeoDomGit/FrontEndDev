@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="min-height-200px">
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
                  <input type="text" class="form-control" id="prodName" placeholder="Tên sản phẩm" />
                </div>
              </div>
                    <div class="col-md-6 ">
                <div class="form-group">
                  <label>Giá</label>
                  <input type="number" class="form-control" id="price" placeholder="Giá"/>
                </div>
              </div>       
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Giảm giá</label>
                  <input type="number" class="form-control" id="discount" placeholder="Giảm giá"/>
                </div>
              </div>
                    <div class="col-md-6 ">
                <div class="form-group">
                  <label>Loại sản phẩm</label>
                  <select name="" id="" class="form-control">
                    @foreach($cate as $item)
                    <option value="">{{$item->cateName}}</option>
                    @endforeach
                  </select>
                </div>
                  </div>
                  <div class="col-md-12 ">
                  <div class="form-group">
                    <label>Thương hiệu</label>
                    <select name="" id="" class="form-control">
                    @foreach($brand as $item)
                    <option value="">{{$item->brandname}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                    <div class="col-md-12">
                        <label >Nội dung</label>
                        <textarea class="form-control" id="desc" rows="4"></textarea>
                    </div>
                </div>
                <br>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addImageProductModal" id="btnAddImageProduct">Thêm hình ảnh</button>
        <button type="submit" id="btnAddProduct" class="btn btn-primary me-2">Thêm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{-- End Modal 2 --}}
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/addProd.js"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="admin/ckfinder/ckfinder.js"></script>
<script>
     CKEDITOR.replace('desc', {
            height: 400,
        });

CKFinder.setupCKEditor();
</script>
@endsection
