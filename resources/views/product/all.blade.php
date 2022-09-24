@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="min-height-200px">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductMD">
  Thêm sản phẩm
</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addProdType">
  Thêm loại sản phẩm
</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addProdTag">
  Thêm tag sản phẩm
</button>
{{-- ============================ --}}
<div class="modal fade" id="addProdTag" tabindex="-1" aria-labelledby="addProdTag" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProdTag">Thêm tag sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @csrf
        <input type="text" class="form-control" id="tagName" placeholder="Tên tag sản phẩm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
</div>
{{-- ============================ --}}
<div class="modal fade" id="addProdType" tabindex="-1" aria-labelledby="addProdType" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProdType">Thêm loại sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @csrf
        <input type="text" class="form-control" placeholder="Tên loại sản phẩm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
</div>
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
                  <select name="" id="" class="form-control"></select>
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
        <button type="submit" id="" class="btn btn-primary me-2">Thêm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="admin/ckeditor/ckeditor.js"></script>
<script>
     CKEDITOR.replace('desc', {
            height: 400,
        });

CKFinder.setupCKEditor();
</script>
@endsection
