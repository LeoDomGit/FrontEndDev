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
    {{-- Modal Edit Size --}}
    @foreach($allSize as $item)
  <div class="modal fade" id="editFormModal{{$item->idSize}}" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFormModalLabel">Chỉnh sửa size "{{$item->sizename}}"</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" value="{{$item->sizename}}" placeholder="Tên size mới" id="sizenameEdit"><br>
          <input type="text" class="form-control" value="{{$item->sizeinfo}}" placeholder="Thông tin size" id="sizeinfoEdit">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="editSizeSubmitBtn">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
    {{-- End Modal Edit --}}
    <button class="btn btn-success"  data-toggle="modal" data-target="#AddSizeModal">Thêm size</button>
    <br><br>
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Tên size</th>
                <th class="table-plus datatable-nosort">Thông tin size</th>
                <th>Ngày tạo</th>
                <th class="datatable-nosort">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allSize as $item)
            <tr>
                <td class="table-plus"><p>{{$item->sizename}}</p></td>
                <td class="table-plus"><p>{{$item->sizeinfo}}</p></td>
                <td><p><?php echo date('H:i d/m/yy',strtotime($item->created_at))?></p></td>
                <td>
                    <div class="dropdown">
                        <a
                            class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                        >
                            <i class="dw dw-more"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                        >
                            <a class="dropdown-item editSize" data-toggle="modal" data-target="#editFormModal{{$item->idSize}}" data-id="{{$item->idSize}}" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a
                            >
                            <a class="dropdown-item deleteSize" data-id="{{$item->idSize}}" href="#"
                                ><i class="dw dw-delete-3"></i> Delete</a
                            >
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/size.js"></script>
@endsection