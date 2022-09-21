@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Tên sản phẩm</b></label>
        <input type="text" class="form-control" id='username' placeholder="Nhập tên sản phẩm">
    </div>
    <div class="col-md-6">
        <label for=""><b>Giá gốc</b></label>
        <input type="number" class="form-control" id='email' placeholder="Nhập giá gốc">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Số lượng</b></label>
        <input type="number" class="form-control" id='username' placeholder="Nhập số lượng">
    </div>
    <div class="col-md-6">
        <label for=""><b>Giá khuyến mãi </b></label>
        <input type="number" class="form-control" id='email' placeholder="Nhập giá khuyến mãi">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-attribute-in-add-product">+ Thêm thuộc tính</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-albumImage-in-add-product">+ Thêm Album ảnh sản phẩm</button>
    </div>
    <div class="col-md-6">
        <label for=""><b>Ảnh đại diện sản phẩm </b></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Danh mục </b></label>
        <select name="" class="form-control" id="">
            <option selected value="">--Chọn danh mục--</option>
            <option value="gyigi">gigyigi</option>

        </select>
    </div>
    <div class="col-md-6">
        <label for=""><b>Thương hiệu </b></label>
        <select name="" class="form-control" id="">
            <option selected value="">--Chọn thương hiệu--</option>
            <option value="gyigi">gigyigi</option>

        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label for=""><b>Mô tả sản phẩm </b></label>
        <textarea style="resize: none;" name="" id="der-create-prod" cols="30" rows="10"></textarea>
        <script>
            CKEDITOR.replace('der-create-prod');
        </script>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 m-auto text-center">
        <button style="width:150px;background:none;border:2px solid #28a745;" id="addUserBtn" type="button" class="btn btn-success text-success">Hủy</button>
        <button style="width:150px;" id="addUserBtn" type="submit" class="btn btn-success">Thêm tài khoản</button>
    </div>
</div>
<!-- Modal thêm thuộc tính -->
<div class="modal fade" id="modal-create-attribute-in-add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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

<!-- Modal thêm album -->
<div class="modal fade" id="modal-create-albumImage-in-add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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
@endsection