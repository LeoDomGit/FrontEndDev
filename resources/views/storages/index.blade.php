@extends('layout.layout1')
@section('title','Quản lý storages')
@section('main-container')
    <!-- Modal Tag -->
<div class="modal fade" id="addStoragesModal" tabindex="-1" aria-labelledby="addStoragesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStoragesModalLabel">Form thêm storages</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <input type="text" placeholder="Tên storages" class="form-control mb-3" id="storageName">
              <input type="text" placeholder="Thông tin storages" class="form-control" id="storageInfo">

            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="saveStoragesBtn">Lưu</button>
        </div>
      </div>
    </div>
</div>
<!-- Button trigger modal -->
{{-- Modal Edit Size --}}
  <div class="modal fade" id="editStoragesModal" tabindex="-1" aria-labelledby="editStoragesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editStoragesModalLabel">Chỉnh sửa Storages</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" placeholder="Tên storages mới" id="storageNameEdit"><br>
          <input type="text" class="form-control" placeholder="Thông tin storages" id="storageInfoEdit">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="editStoragesBtn">Lưu</button>
        </div>
      </div>
    </div>
  </div>
    {{-- End Modal Edit --}}
    <button class="btn btn-success"  data-toggle="modal" data-target="#addStoragesModal">Thêm storages</button>
    <br><br>
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Tên kho</th>
                <th class="table-plus datatable-nosort">Thông tin kho</th>
                <th>Ngày tạo</th>
                <th class="datatable-nosort">Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allStorages as $item)
            <tr>
                <td class="table-plus"><p>{{$item->storageName}}</p></td>
                <td class="table-plus"><p>{{$item->storageInfo}}</p></td>
                <td><p><?php echo date('H:i d/m/yy',strtotime($item->created_at))?></p></td>
                <td>
                    <div class="dropdown">
                        <a
                            class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        >
                            <i class="dw dw-more"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                        >
                            <a class="dropdown-item editStorages" data-toggle="modal" data-target="#editStoragesModal" data-id="{{$item->id}}" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item deleteStorages" data-id="{{$item->id}}" href="#"
                                ><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  </div>
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/storages.js"></script>
@endsection