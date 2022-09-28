@extends('layout.layout1')
@section('title','Quản lý màu ')
@section('main-container')
    <!-- Modal Color -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form thêm màu</h5>
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
  <div>
    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">Thêm màu </button><br><br>
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
                  <td class="table-plus"><p>{{$item->colorName}}</p></td>
                  <td><p style="width:20px;height:20px;border-radius:50%;background:<?=$item->colorpicker?>" ></p></td>
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
                              <a class="dropdown-item" href="#"
                                  ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#"
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