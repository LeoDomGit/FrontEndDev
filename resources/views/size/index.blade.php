@extends('layout.layout1')
@section('title','Quản lý size')
@section('main-container')
    {{-- Modal Thêm size --}}
    <div class="modal fade" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddSizeModalLabel">Thêm size </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="text" placeholder="Tên size" class="form-control mb-3" id="sizeName">
              <input type="text" placeholder="Thông tin size" class="form-control" id="sizeInfo">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" id="addNewSizeBtn">Lưu</button>
            </div>
          </div>
        </div>
      </div>
    {{-- End Modal --}}
    <button class="btn btn-success"  data-toggle="modal" data-target="#AddSizeModal">Thêm size</button>
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/size.js"></script>
@endsection