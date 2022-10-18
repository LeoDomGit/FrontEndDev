@extends('layout.layout1')
@section('title','Quản lý danh mục')
@section('main-container')
        <div style="with:100px;height:auto;position: absolute; top:50%;left:50%" id="waitingimage">
           
        </div>
        {{-- Modal 1 --}}
        <div class="modal fade" id="addDMSP" tabindex="-1" aria-labelledby="addDMSPLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addDMSPLabel">Thêm danh mục sản phẩm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control" id="newcateadd" placeholder="Tên danh mục">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary" id="addnewcatebtn">Lưu</button>
                </div>
              </div>
            </div>
          </div>
        {{-- End Modal 1 --}}

        {{-- ====================Modal 2 --}}

        <!-- Modal -->
        <div class="modal fade" id="editCateModal" tabindex="-1" aria-labelledby="editCateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editCateModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <input type="text" class="form-control" id="newCateEdit" placeholder="Tên loại sản phẩm mới">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submiteditCateBtn">Lưu</button>
                </div>
            </div>
            </div>
        </div>

  {{-- ------------------------- --}}
    <button class="btn btn-primary" data-toggle="modal" data-target="#addDMSP">Thêm danh mục</button><br><br>
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Tên loại sản phẩm</th>
                <th>Tình trạng</th>
                <th>Ngày tạo</th>
                <th class="datatable-nosort">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allcate as $item)
            <?php 
                $tinhtrang ='';
            if($item->status==0){
                $tinhtrang ='<p>Đang đóng</p>';
                }else{
                $tinhtrang ='<p>Đang mở</p>';
                }?>
            <tr>
                <td class="table-plus"><p>{{$item->cateName}}</p></td>
                <td class="switchCateBtn" data-id="{{$item->idcate}}"><?=$tinhtrang?></td>
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
                            <a class="dropdown-item switchCateBtn" data-id="{{$item->idcate}}" href="#"
                                ><i class="dw dw-eye"></i> Switch</a
                            >
                            <a class="dropdown-item editCate" data-toggle="modal" data-id="{{$item->idcate}}" data-target="#editCateModal" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a
                            >
                            <a class="dropdown-item deleteCate" data-id="{{$item->idcate}}" href="#"
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
    <script src="admin/script/categrories.js"></script>
@endsection