@extends('layout.layout1')
@section('title','Sửa sản phẩm')
@section('main-container')
<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Sửa sản phẩm</h4>
		</div>
	</div>
	<form>
        <div class="row">					
			<div class="col-md-6 ">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" id="productName"  placeholder="Tên sản phẩm" />
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
                <label >Textarea</label>
                <textarea class="form-control" id="desc" rows="4"></textarea>
            </div>
        </div>
        <br>
        <button type="submit" id="" class="btn btn-primary me-2">Cập nhật</button>
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