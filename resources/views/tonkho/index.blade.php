@extends('layout.layout1')
@section('title','Quản lý tồn kho')
@section('main-container')
<link rel="stylesheet" href="admin/colors/style.css">
<link rel="stylesheet" href="admin/colors/coloris.min.css">
<script src="admin/colors/coloris.min.js"></script>
<select class="form-control col-6" name="" id="ProductSelect">
    <option value="" disabled selected>Lựa chọn sản phẩm</option>
    @foreach ($allProducts as $item)
    <option value="{{$item->idProd}}">{{$item->prodName}}</option>        
    @endforeach
</select>

  <!-- Modal -->
  <div class="modal fade" id="ResultColorModal" tabindex="-1" aria-labelledby="ResultColorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ResultColorModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="example square">
                <input type="text" id="colorPath" class="coloris instance1 form-control" value="rgb(255, 0, 0)">
                </div>
            </div>
            <div class="col-4">
                <button class="btn btn-secondary w-100">Thêm</button>
            </div>
          </div>
          <div class="row">
            <div id="arrColor">
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
  </div>
<script src="admin/colors/script.js"></script>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/storage.js"></script>
@endsection