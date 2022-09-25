@extends('layout.layout1')
@section('title','Quản lý thương hiệu')
@section('main-container')
    {{-- Model Add Brand --}}
    <div class="modal fade" id="addBrandMd" tabindex="-1" aria-labelledby="addBrandMdLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addBrandMdLabel">Thêm thương hiệu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf
              <input type="text" placeholder="Thương hiệu mới" id="newBrandadd" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button"  class="btn btn-primary" id="addBrandBtn">Lưu thương hiệu</button>
            </div>
          </div>
        </div>
      </div>
      {{-- end Modal 1 --}}

    <button class="btn btn-primary"  data-toggle="modal" data-target="#addBrandMd">Thêm thương hiệu</button>

    <br><br>
	{{-- ============
                    =========
                             ======= --}}

    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editBrandModalLabel">Sửa thương hiệu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Thương hiệu mới" id="newBrandedit" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" id="saveeditBrandbtn">Lưu</button>
            </div>
          </div>
        </div>
      </div>
    {{-- ====== 
                =========
                            ======
                                    ======== --}}
    <div class="">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Tên thương hiệu</th>
                    <th>Ngày tạo</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allBrand as $item)
                <tr>
                    <td class="table-plus"><p>{{$item->brandname}}</p></td>
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
                                    ><i class="dw dw-eye"></i> View</a
                                >
                                <a class="dropdown-item editbrand" data-toggle="modal" data-id="{{$item->idbrand}}" data-target="#editBrandModal" href="#"
                                    ><i class="dw dw-edit2"></i> Edit</a
                                >
                                <a class="dropdown-item deleteBrandBtn" data-id="{{$item->idbrand}}" href="#"
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
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="admin/script/brand.js"></script>
@endsection