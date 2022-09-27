@extends('layout.layout1')
@section('title','Quản lý màu ')
@section('main-container')
    <!-- Modal Color -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" placeholder="Tên màu" class="form-control" id="newColorName">
          <input type="color" id="newColorpath" style="width:20%" class="form-control mt-2">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="saveColorBtn">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal Color --}}
    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">Thêm màu </button>
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/color.js"></script>
@endsection