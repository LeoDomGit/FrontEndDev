@extends('layout.layout1')
@section('title','Quản lý tồn kho')
@section('main-container')
{{-- <link rel="stylesheet" href="select/select2.min.css"> --}}
<script src="select/select2.min.js"></script>
<link rel="stylesheet" href="admin/colors/coloris.min.css">
<script src="admin/colors/coloris.min.js"></script>

  <div class="row">
    <div class="col-xl-6 col-sm-12 col-md-12">
      <select class="form-control h-100" name="" id="ProductSelect">
        <option value="" disabled selected>Sản phẩm chưa nhập kho</option>
        @foreach ($allProducts as $item)
        <option value="{{$item->idProd}}">{{$item->prodName}}</option>        
        @endforeach
    </select>
    </div>
    <div class="col-xl-6 co-sm-12 col-md-12">
      <select class="form-control col-12" name="" id="ProductSelect2">
        
        <option value="" disabled selected>Sản phẩm nhập kho</option>
        <option value="0">Tất cả</option>
        @foreach ($allProducts2 as $item)

        <option value="{{$item->idProd}}">{{$item->prodName}}</option>        
        @endforeach
    </select>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="ResultColorModal" tabindex="-1" aria-labelledby="ResultColorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ResultColorModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 mr-2">
              <div class="example square">
                <input type="text" id="colorPath" class="coloris instance1 form-control" value="rgb(255, 0, 0)">
                </div>
            </div>
            <div class="col-4">
                <button class="btn btn-secondary w-100" id="addColorBtn">Thêm</button>
            </div>
          </div>
          <div class="row" id="arrColor">
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveColorProductBtn">Lưu</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal Color Name Edit --}}

  <div class="modal fade" id="colorEditModal" tabindex="-1" aria-labelledby="colorEditModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="colorEditModalLabel">Thay đổi tên màu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row mb-3">
              <div class="col-2">
                <div id="colorar"></div>
              </div>
              <div class="col-10">
                <input type="text" class="form-control" id="newColorName" placeholder="Tên mới của màu sắc">
              </div>
            </div>
        </div> 
      </div>
    </div>
  </div>
  {{-- =================== --}}
  
  <div class="modal fade" id="editQuantityModal" tabindex="-1" aria-labelledby="editQuantityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <input type="number" class="form-control" id="newquantity" placeholder="Nhập số lượng sản phẩm">
        </div>
      </div>
    </div>
  </div>
  {{--  --}}
  <div  style="width100%" class="mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-xl-8 col-sm-12" id="resultColors">

    </div>

  </div>
    
  </div>
  <div class="mt-3" id="StorageTable">
    <table class="data-table table stripe hover nowrap">
      <thead>
        <tr>
          <th class="table-plus datatable-nosort">Tên Sản Phẩm</th>
          <th>Màu sắc</th>
          <th>Loại Size</th>
          <th>Số lượng</th>
          <th class="datatable-nosort">Action</th>
          <th class="datatable-nosort"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allProducts3 as $item)
        <tr>
          <td class="table-plus">{{$item->productName}}</td>
          <td><div style="background-color:#333;width:40px;height:40px;border-radius:50%"></div></td>
          <td>1</td>
          <td>{{$item->quantity}}</td>
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
                <a class="dropdown-item viewProductBtn" data-id="{{$item->id}}" href=""
                  ><i class="dw dw-eye"></i> View</a
                >
              </div>
            </div>
          </td>
          <td></td>
          
        </tr>
                    
        @endforeach

      </tbody>
    </table>
  </div>
<script src="admin/colors/script.js"></script>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/storage.js"></script>
<script>
  $(document).ready(function () {
    $("#ProductSelect").select2( {
	placeholder: "Tìm kiếm ",
	allowClear: true
	} );
  $("#ProductSelect2").select2( {
	placeholder: "Tìm kiếm ",
	allowClear: true
	} );
  });

</script>
@endsection