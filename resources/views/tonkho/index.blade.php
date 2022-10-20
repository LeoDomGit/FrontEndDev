@extends('layout.layout1')
@section('title','Quản lý tồn kho')
@section('main-container')
<select class="form-control col-6" name="" id="ProductSelect">
    @foreach ($allProducts as $item)
    <option value="{{$item->idProd}}">{{$item->prodName}}</option>        
    @endforeach
</select>
<div id="resultModal">  
  <!-- Modal -->
  <div class="modal fade" id="ResultColorModal" tabindex="-1" aria-labelledby="ResultColorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ResultColorModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/storage.js"></script>
@endsection