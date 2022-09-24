@extends('layout.layout1')
@section('title','Thêm sản phẩm')
@section('main-container')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<button data-bs-toggle="modal" data-bs-target="#q" class="btn btn-primary mb-3">Thêm loại sản phẩm</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tên loại sản phẩm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" placeholder="Tên loại sản phẩm" id="tenLoaiSP" class="form-control p-4">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="addNewsTypeBtn" class="btn btn-primary">Chấp nhận</button>
        </div>
      </div>
    </div>
  </div>
<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Thêm sản phẩm</h4>
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
        <button type="submit" id="" class="btn btn-primary me-2">Thêm</button>
            <button class="btn btn-light">Thoát</button>
	</form>
</div>
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script>
         CKEDITOR.replace('desc', {
                height: 400,
            });

    CKFinder.setupCKEditor();
  </script>
@endsection