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
            <div >
                <div >
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
          <h5 class="modal-title" id="editTagModalLabel">Chỉnh sửa Tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <div>
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
                  <th class="table-plus datatable-nosort">Tên tag</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
                  <th class="datatable-nosort">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $trangthai='';
            ?>
          @foreach ($allTag as $item)
          <?php if($item->status==0){
              $trangthai='<b>Đang khóa</b>';
              }else{
                $trangthai='<b>Đang mở</b>';
            }
          ?>
            <tr>
                <td class="table-plus"><p>{{$item->tagname}}</p></td>
                <td class="table-plus"><p><?=$trangthai?></p></td>
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
                            <a class="dropdown-item tagclass" data-toggle="modal" data-target="#editTagModal" data-id="{{$item->idtag}}" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a
                            >
                            <a class="dropdown-item deleteTag" data-id="{{$item->idtag}}" href="#"
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
    <script src="admin/script/tag.js"></script>
@endsection