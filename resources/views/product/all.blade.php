@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Danh sách sản phẩm</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li><button style="width:200px;" class="btn btn-primary">+ Thêm sản phẩm</button></li>
                        
                        <li><button style="width:200px;" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i> Thùng rác</button></li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="col-md-6 col-sm-12 text-right">

            </div> --}}
        </div>
    </div>
    <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="userManager" tabindex="-1" aria-labelledby="userManagerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userManagerLabel">Quản lý loại tài khoản</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Thêm loại tài khoản</button>
          <div class="mt-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p w-100">
                        <div class="list-group">
                           
                            <a
                            href="#"
                            class="list-group-item list-group-item-action"
                            >grhyjt6j</a>
                            <br>
                           

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  {{-- Modal2  --}}
  <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm loại tài khoản</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" id="newUserRole" placeholder="Loại tài khoản mới">
        </div>
        <div class="modal-footer">
          <button type="button" id="addUserRolebtn" class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End MD2 --}}
    <div class="">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Username</th>
                    <th>Role</th>
                    <th>Tình trạng tài khoản</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td class="table-plus"><p>rdhdrhrdh</p></td>
                    <td>drhdrhdrh</td>
                    <td>gfhdhdrh</td>
                    <td><p>drhdrhdrhdrh</p></td>
                    <td>gsegsg</td>
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
              
            </tbody>
        </table>
    </div>
@endsection
