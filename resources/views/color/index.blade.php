@extends('layout.layout1')
@section('title','Quản lý màu ')
@section('main-container')
    <!-- Modal Color -->
<div class="modal fade" id="addColorModal" tabindex="-1" aria-labelledby="addColorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addColorModalLabel">Form thêm màu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-10">
                    <input type="text" placeholder="Tên màu" class="form-control" id="newColorName">
                </div>
                <div class="col-2">
                    <input type="color"  id="newColorpath" style="width:50px;height:50px;border-radius:50%" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="saveColorBtn">Lưu</button>
        </div>
      </div>
    </div>
</div>
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="editColorModal" tabindex="-1" aria-labelledby="editColorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editColorModalLabel">Chỉnh sửa bảng màu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-10">
                    <input type="text" placeholder="Tên màu" class="form-control" id="newColorName1">
                </div>
                <div class="col-2">
                    <input type="color"  id="newColorpath1" style="width:50px;height:50px;border-radius:50%" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" id='submiteditColor' class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal Color --}}
  <div>
    <button data-toggle="modal" data-target="#addColorModal" class="btn btn-warning">Thêm màu </button><br><br>
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
              @foreach ($colors as $item)
              <tr>
                  <td class="table-plus"><p class="colorclass" data-id="{{$item->id}}" data-toggle="modal" data-target="#editColorModal">{{$item->colorName}}</p></td>
                  <td><p class="colorclass" data-id="{{$item->id}}" data-toggle="modal" data-target="#editColorModal" style="width:20px;height:20px;border-radius:50%;background:<?=$item->colorpicker?>" ></p></td>
                  <td><?php if($item->status==0){?>
                      <p>Đang khóa</p>
                  <?php }else{ ?>
                      <p>Đang hiện</p>
                  <?php } ?></td>
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
                              <a class="dropdown-item colorclass" href="#" data-id="{{$item->id}}" data-toggle="modal" data-target="#editColorModal"
                                  ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item deleteColor" href="#" data-id="{{$item->id}}"
                                  ><i class="dw dw-delete-3"></i> Delete</a
                              >
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
    <script src="admin/script/color.js"></script>
@endsection