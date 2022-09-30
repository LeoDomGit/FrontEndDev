@extends('layout.layout1')
@section('title','Quản lý thương hiệu')
@section('main-container')
<?php

use Carbon\Carbon;

Carbon::setLocale('vi');
?>
{{-- Model Add Brand --}}
<div class="modal fade" id="addBrandMd" tabindex="-1" aria-labelledby="addBrandMdLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="form-add-brand">
        <div class="modal-header">
          <h5 class="modal-title" id="addBrandMdLabel">Thêm thương hiệu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="text" placeholder="Thương hiệu mới" id="newBrandadd" name="nameBrand" class="form-control">
          <h5 class="modal-title mt-2 mb-2" id="addBrandMdLabel">Chọn danh mục</h5>
          @foreach($allCategory as $row)
          <div class="custom-control custom-checkbox custom-qtcs-create">
            <input type="checkbox" name="cate[]" value="{{ $row->idcate }}" class="custom-control-input ip-checkbox-cate-brand" id="ip-cate-create-brand-{{ $row->idcate }}">
            <label style="color: #282739;font-weight:bold;" class="custom-control-label" for="ip-cate-create-brand-{{ $row->idcate }}">{{ $row->cateName }}</label>
          </div>
          @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary" id="addBrandBtn">Lưu thương hiệu</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- end Modal 1 --}}

<button class="btn btn-primary" data-toggle="modal" data-target="#addBrandMd">Thêm thương hiệu</button>

<br><br>
{{-- ============
                    =========
                             ======= --}}


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
      @php
      $arr = [];
      foreach ($item->cate as $key => $value) {
      $arr[] = $value->idcate;
      }
      @endphp
      <tr>
        <td class="table-plus">
          <p>{{$item->brandname}}</p>
        </td>
        <td>
          <p><?php echo date('H:i d/m/yy', strtotime($item->created_at)) . " - ( " . Carbon::parse($item->created_at)->diffForHumans() . " ) "; ?></p>
        </td>
        <td>
          <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
              <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
              <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Xem</a>
              <a class="dropdown-item editbrand" data-toggle="modal" data-id="{{$item->idbrand}}" data-target="#editBrandModal{{ $item->idbrand }}" href="#"><i class="dw dw-edit2"></i> Chỉnh sửa</a>
              <a class="dropdown-item deleteBrandBtn" data-id="{{$item->idbrand}}" href="#"><i class="dw dw-delete-3"></i> Xóa</a>
            </div>
          </div>
        </td>
      </tr>
      <div class="modal fade" id="editBrandModal{{ $item->idbrand }}" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <form data-id="{{ $item->idbrand }}" id="form-update-brand">
            <div class="modal-header">
              <h5 class="modal-title" id="editBrandModalLabel">Chỉnh sửa "{{ $item->brandname }}"</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <input type="hidden" name="idBrand" value="{{ $item->idbrand }}">
                <input type="text" placeholder="Thương hiệu mới" value="{{ $item->brandname }}" name="nameBrand" id="newBrandedit{{ $item->idbrand }}" class="form-control">
                <h5 class="modal-title mt-2 mb-2" id="addBrandMdLabel">Chọn danh mục</h5>
                @foreach($allCategory as $row)
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="cate[]" value="{{ $row->idcate }}" class="custom-control-input ip-checkbox-cate-for-brand-{{ $item->idbrand }}" id="ip-cate-edit-brand-{{ $row->idcate }}-by-brand-id-{{$item->idbrand}}" {{ $show = (in_array($row->idcate,$arr)) ? 'checked' : '' }}>
                  <label style="color: #282739;font-weight:bold;" class="custom-control-label" for="ip-cate-edit-brand-{{ $row->idcate }}-by-brand-id-{{$item->idbrand}}">{{ $row->cateName }}</label>
                </div>
                @endforeach
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary" id="saveeditBrandbtn">Lưu</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/brand.js"></script>
@endsection