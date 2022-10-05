<link rel="stylesheet" href="admin/src/styles/dropdrag.css">
<link rel="stylesheet" href="admin/src/styles/dropdrag2.css">

<style>
  .waitingscreen {
    width: 200px;
    margin: 0px auto;
  }

  .deleteImageIcon {
    display: none;
    transition: ease-in-out 2s;

  }

  .imageProds:hover .deleteImageIcon {
    position: absolute;
    top: 45%;
    left: 45%;
    color: white;
    text-align: center;
    font-weight: bolder;
    cursor: pointer;
    font-size: 18px;
    background: black;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: block;
  }

  .listGalleryBeforeUpload>img {
    width: 50%;
    height: 100px;
    float: left;
  }
</style>
@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<?php

use Carbon\Carbon;

Carbon::setLocale('vi');
?>
<div class="min-height-200px">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductMD">
    Thêm sản phẩm
  </button>
  {{-- ============================ --}}
  <!-- Modal -->
  <div class="modal fade" id="addProductMD" tabindex="-1" aria-labelledby="addProductMDLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductMDLabel">Thêm sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="pd-20 card-box mb-30">
            <div class="clearfix">
              <div class="pull-left">

              </div>
            </div>
            <form>
              <div class="row">
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" id="prodName" placeholder="Tên sản phẩm" />
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tóm tắt sản phẩm</label>
                    <input type="text" class="form-control" id="summary" placeholder="Tóm tắt sản phẩm" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select onchange="SelectBrandBySelectCate(this)" name="" id="prodTypeID" class="form-control">
                      <option value="" selected>--Chọn loại sản phẩm--</option>
                      @foreach($cate as $item)
                      <option value="{{$item->idcate}}">{{$item->cateName}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Thương hiệu</label>
                    <select disabled name="" id="brandID" class="form-control select-brand-by-prod">

                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <label>Nội dung</label>
                  <textarea class="form-control" id="desc" rows="4"></textarea>
                </div>
              </div>
              <br>

            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addImageProductModal" id="btnAddImageProduct">Thêm hình ảnh</button>
          <button type="submit" id="btnAddProduct" class="btn btn-primary me-2">Thêm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal 1 --}}
  {{-- Modal 2 --}}

  <div class="modal fade" id="addImageProductModal" tabindex="-1" aria-labelledby="addImageProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addImageProductModalLabel">Thêm hình ảnh sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="top">
              <p>Drag & drop image uploading</p>
              <button id="submitImageProd" type="button">Upload</button>
            </div>
            <div class="drag-area">
              <span class="visible">
                Drag & drop image here or
                <span class="select" role="button">Browse</span>
              </span>
              <span class="on-drop">Drop images here</span>
              <input name="file" type="file" class="file" multiple />
            </div>

            <!-- IMAGE PREVIEW CONTAINER -->
            <div class="container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal 2 --}}

  {{-- ========================== --}}

  {{-- Modal 3 --}}
  <!-- Modal -->

  {{-- endModal --}}

  <div class="mt-3">
    <table class="data-table table hover multiple-select-row nowrap ">
      <thead>
        <tr>
          <th class="table-plus datatable-nosort">Tên sản phẩm</th>
          <th>Thông tin sản phẩm</th>
          <th>Tình trạng</th>
          <th>Loại sản phẩm</th>
          <th>Thương hiệu</th>
          <th>Ngày tạo</th>
          <th>Tùy chỉnh</th>
        </tr>
      </thead>
      <tbody>
        @if(count($products) > 0)
        @foreach ($products as $item)
        {{-- Modal 4 --}}
        <!-- Modal -->
        <div class="modal fade" id="AddMoreImgModal{{ $item->id }}" tabindex="-1" aria-labelledby="AddMoreImgModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="form-add-gallery">
                <div class="modal-header">
                  <h5 class="modal-title" id="AddMoreImgModalLabel">Thêm hình ảnh sản phẩm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div style="min-height:400px" class="modal-body">
                  <div class="drop">
                    <div class="cont">
                      <i class="fa fa-cloud-upload"></i>
                      <div class="tit">

                      </div>
                      <div class="desc">

                      </div>
                      <div class="browse">Thêm ảnh
                      </div>
                    </div>
                    <input type="hidden" name="idProd" id="idProd" value="{{ $item->id }}">
                    <output class="listGalleryBeforeUpload" id="list{{ $item->id }}">

                    </output><input id="files" data-id="{{ $item->id }}" class="files" multiple="true" name="files[]" type="file" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="addmoreimagebtn" class="btn btn-primary btnaddmoreimagebtn">Lưu</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- end Modal --}}
        <div class="modal fade" id="productDetail{{$item->id}}" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="productDetailLabel">Chi tiết sản phẩm </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <?php
                    if ($item->status == 0) {
                      $tinhtrang = 'Đang Khóa';
                    } else {
                      $tinhtrang = 'Đang Mở';
                    }
                    ?>
                    <div class="row">
                      <div class="col-6">
                        <h5>Tên sản phẩm : {{$item->productName}}</h5>
                      </div>
                      <div class="col-4">
                        <h5>Tình trạng : <?= $tinhtrang ?></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <h5> Tóm tắt sản phẩm : {{$item->summary}}</h5>
                      </div>
                      <div class="col-3">
                        <h5> Loại : {{$item->cate->cateName}}</h5>
                      </div>
                      <div class="col-3">
                        <h5> Hãng : {{$item->brand->brandname}} </h5>
                      </div>

                    </div>
                    <div class="row ">
                      <div class="col-3">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col">
                        {!!$item->content!!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td class="table-plus">{{ $item->productName }}</td>
          <td>{{$item->summary}}</td>
          <td><?php if ($item->status == 0) {
                echo "Đang đóng";
              } else {
                echo "Đang mở";
              } ?></td>
          <td>{{$item->cate->cateName}}</td>
          <td>{{$item->brand->brandname}}</td>
          <td><?php echo Carbon::parse($item->created_at)->format('h:i - d/m/') . Carbon::parse($item->created_at)->year . " (" . Carbon::parse($item->created_at)->diffForHumans() . ")"; ?></td>
          <td>
            <div class="mt-2">
              <button data-toggle="modal" data-target="#editProductMD{{$item->id}}" class="btn btn-warning editBtn" data-id="{{$item->id}}">Sửa</button> <button class="btn btn-danger">Xóa</button> <button class="btn btn-success proddetailbtn" data-id="{{$item->id}}" data-toggle="modal" data-target="#productDetail{{$item->id}}">Chi tiết</button> <button class="btn btn-warning btnAddImageProduct" data-toggle="modal" data-toggle="modal" data-target="#AddMoreImgModal{{ $item->id }}">Thêm hình ảnh</button>
            </div>
          </td>
        </tr>
        <!-- Modal edit-product -->
        <div class="modal fade" id="editProductMD{{$item->id}}" tabindex="-1" aria-labelledby="editProductMDLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <form id="form-edit-prod">
                <div class="modal-header">
                  <h5 class="modal-title" id="editProductMDLabel">Sửa sản phẩm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                      <div class="pull-left">

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Tên sản phẩm</label>
                          <input type="hidden" name="id" value="{{ $item->id }}">
                          <input type="text" class="form-control" id="prodNameedit" name="nameProd" value="{{ $item->productName }}" placeholder="Tên sản phẩm" />
                          <div id="nameProd" class="invalid-feedback">

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Tóm tắt sản phẩm</label>
                          <input type="text" class="form-control" id="summaryedit" value="{{ $item->summary }}" name="summaryProd" placeholder="Tóm tắt sản phẩm" />
                          <div id="summaryProd" class="invalid-feedback">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Loại sản phẩm</label>
                          <select onchange="SelectBrandBySelectCate(this)" name="cateProd" id="prodTypeIDedit" class="form-control">
                            @foreach($cate as $row)
                            <option value="{{ $row->idcate }}" {{$show = ($row->idcate == $item->idcate) ? 'selected' : ''}}>{{ $row->cateName }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Thương hiệu</label>
                          <select name="brandProd" id="brandIDedit" class="form-control select-brand-by-prod">
                            @foreach($brand as $row)
                            <option value="{{ $row->idbrand }}" {{ $show = ($item->idBrand== $row->idbrand)? 'selected' :'' }}>{{ $row->brandname }}</option>
                            @endforeach
                          </select>
                          <div id="brandProd" class="invalid-feedback">

                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label>Nội dung</label>
                        <textarea required class="form-control" name="contentProd" id="descedit{{ $item->id }}" rows="4">{!! $item->content !!}</textarea>
                        <div id="contentProd" class="invalid-feedback">

                        </div>
                        <script>
                          CKEDITOR.replace('descedit{{ $item->id }}', {
                            height: 400,
                          });
                        </script>
                      </div>

                    </div>
                    <div class="row bg-dark" id="imagesedit">

                    </div>
                    <br>


                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnEditProduct" class="btn btn-primary me-2">Sửa</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End modal -->
        @endforeach
        @else
        <tr>
          <td class="text-center" colspan="7">Không có kết quả nào !</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/addProd.js"></script>
<script src="admin/script/editProd.js"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="admin/ckfinder/ckfinder.js"></script>
<script>
  CKEDITOR.replace('desc', {
    height: 400,
  });

  CKFinder.setupCKEditor();
</script>
@endsection