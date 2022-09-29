@extends('layout.layout1')
@section('title','Quản lý tag ')
@section('main-container')
    <!-- Modal Tag -->
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTagModalLabel">Form thêm tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-10">
                    <input type="text" placeholder="Tên tag" class="form-control" id="newTagName">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="saveTagBtn">Lưu</button>
        </div>
      </div>
    </div>
</div>
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTagModalLabel">Chỉnh sửa bảng màu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-10">
                    <input type="text" placeholder="Tên tag" class="form-control" id="newTagName1">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" id='submiteditTag' class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal Color --}}
  <div>
    <button data-toggle="modal" data-target="#addTagModal" class="btn btn-warning">Thêm tag </button><br><br>
    <div class="">
      <table class="data-table table stripe hover nowrap">
          <thead>
              <tr>
                  <th class="table-plus datatable-nosort">Tên màu</th>
                  <th>Mã màu</th>
                  <th>Tình trạng</th>
                  <th>Ngày tạo</th>
                  <th class="datatable-nosort">Action</th>
              </tr>
          </thead>
          <tbody>
             
          </tbody>
      </table>
  </div>
  </div>
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/tag.js"></script>
@endsection